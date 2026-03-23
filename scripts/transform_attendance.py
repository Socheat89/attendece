import re

source_file = r'c:\Users\oeun_\Downloads\attendence\mekongcy_hrm.sql'
output_file = r'c:\Users\oeun_\Downloads\attendence\fix_attendance_import.sql'

emp_map = {
    '3': '8',
    '4': '9',
    '5': '10',
    '6': '11'
}
target_branch_id = '27'
target_company_id = '20'

sessions = []
logs = []

# Regex for parsing SQL values
# Example: (6, 3, 3, '2026-03-02', 0, 62, 0, 0, 0, '2026-03-02 18:02:24', '2026-03-02 18:02:34')
session_regex = re.compile(r"\((\d+),\s*(\d+),\s*(\d+),\s*'([^']+)',\s*(\d+),\s*(\d+),\s*(\d+),\s*(\d+),\s*(\d+),\s*'([^']+)',\s*'([^']+)'\)")

# Example: (19, 6, 3, 3, 'morning_in', '2026-03-02 18:02:24', 11.5756860, 104.8526890, 9.42, 'Mozilla/5.0 ...', '117.20.113.86', '...', '...', '...')
log_regex = re.compile(r"\((\d+),\s*(\d+),\s*(\d+),\s*(\d+),\s*'([^']+)',\s*'([^']+)',\s*([\d\.-]+),\s*([\d\.-]+),\s*([\d\.-]+),\s*'([^']*)',\s*'([^']*)',\s*'([^']*)',\s*'([^']*)',\s*'([^']*)'\)")

with open(source_file, 'r', encoding='utf-8') as f:
    in_sessions = False
    in_logs = False
    for line in f:
        if 'Dumping data for table `attendance_sessions`' in line:
            in_sessions = True
            in_logs = False
            continue
        if 'Dumping data for table `attendance_logs`' in line:
            in_logs = True
            in_sessions = False
            continue
        if line.startswith('--') or line.strip() == '' or line.startswith('INSERT INTO') or line.startswith('UNLOCK TABLES') or line.startswith('LOCK TABLES'):
            # If a new INSERT statement starts, we are still in the same table, but if a new table comment starts, we are not
            if line.startswith('-- Table structure') or line.startswith('-- Dumping data for table'):
                in_sessions = False
                in_logs = False
            continue
        
        if in_sessions:
            matches = session_regex.findall(line)
            for m in matches:
                # m = (id, employee_id, branch_id, attendance_date, late_minutes, early_leave_minutes, work_minutes, overtime_minutes, has_fake_gps_flag, created_at, updated_at)
                s_id, s_emp_id, s_branch_id, s_date, s_late, s_early, s_work, s_ot, s_fake, s_created, s_updated = m
                if s_emp_id in emp_map:
                    sessions.append({
                        'old_id': s_id,
                        'employee_id': emp_map[s_emp_id],
                        'branch_id': target_branch_id,
                        'attendance_date': s_date,
                        'late_minutes': s_late,
                        'early_leave_minutes': s_early,
                        'work_minutes': s_work,
                        'overtime_minutes': s_ot,
                        'has_fake_gps_flag': s_fake,
                        'created_at': s_created,
                        'updated_at': s_updated,
                        'company_id': target_company_id
                    })
        
        if in_logs:
            matches = log_regex.findall(line)
            for m in matches:
                # m = (id, attendance_session_id, employee_id, branch_id, scan_type, scanned_at, latitude, longitude, distance_from_branch, device_info, ip_address, qr_token, created_at, updated_at)
                l_id, l_session_id, l_emp_id, l_branch_id, l_type, l_at, l_lat, l_lng, l_dist, l_device, l_ip, l_qr, l_created, l_updated = m
                if l_emp_id in emp_map:
                    logs.append({
                        'old_id': l_id,
                        'old_session_id': l_session_id,
                        'employee_id': emp_map[l_emp_id],
                        'branch_id': target_branch_id,
                        'scan_type': l_type,
                        'scanned_at': l_at,
                        'latitude': l_lat,
                        'longitude': l_lng,
                        'distance_from_branch': l_dist,
                        'device_info': l_device,
                        'ip_address': l_ip,
                        'qr_token': l_qr,
                        'created_at': l_created,
                        'updated_at': l_updated,
                        'company_id': target_company_id
                    })

with open(output_file, 'w', encoding='utf-8') as f:
    f.write("-- Transformed attendance data\n")
    f.write("SET FOREIGN_KEY_CHECKS = 0;\n\n")
    
    f.write("-- Insert attendance_sessions\n")
    if sessions:
        f.write("INSERT IGNORE INTO `attendance_sessions` (`employee_id`, `branch_id`, `attendance_date`, `late_minutes`, `early_leave_minutes`, `work_minutes`, `overtime_minutes`, `has_fake_gps_flag`, `created_at`, `updated_at`, `company_id`) VALUES\n")
        values = []
        for s in sessions:
            val = f"({s['employee_id']}, {s['branch_id']}, '{s['attendance_date']}', {s['late_minutes']}, {s['early_leave_minutes']}, {s['work_minutes']}, {s['overtime_minutes']}, {s['has_fake_gps_flag']}, '{s['created_at']}', '{s['updated_at']}', {s['company_id']})"
            values.append(val)
        f.write(",\n".join(values) + ";\n\n")
    
    f.write("-- Insert attendance_logs\n")
    if logs:
        # We need to find the session_id for each log.
        # Since we use attendance_date and employee_id as a unique key for sessions, we can use a subquery.
        f.write("INSERT INTO `attendance_logs` (`attendance_session_id`, `employee_id`, `branch_id`, `scan_type`, `scanned_at`, `latitude`, `longitude`, `distance_from_branch`, `device_info`, `ip_address`, `qr_token`, `created_at`, `updated_at`, `company_id`) VALUES\n")
        values = []
        for l in logs:
            date_only = l['scanned_at'].split(' ')[0]
            session_lookup = f"(SELECT id FROM attendance_sessions WHERE employee_id = {l['employee_id']} AND attendance_date = '{date_only}' LIMIT 1)"
            
            # Escape single quotes in device_info
            device_info = l['device_info'].replace("'", "''")
            
            val = f"({session_lookup}, {l['employee_id']}, {l['branch_id']}, '{l['scan_type']}', '{l['scanned_at']}', {l['latitude']}, {l['longitude']}, {l['distance_from_branch']}, '{device_info}', '{l['ip_address']}', '{l['qr_token']}', '{l['created_at']}', '{l['updated_at']}', {l['company_id']})"
            values.append(val)
        f.write(",\n".join(values) + ";\n\n")

    f.write("SET FOREIGN_KEY_CHECKS = 1;\n")

print(f"Generated {len(sessions)} sessions and {len(logs)} logs in {output_file}")
