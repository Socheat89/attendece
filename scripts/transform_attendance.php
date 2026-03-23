<?php

$source_file = 'c:\\Users\\oeun_\\Downloads\\attendence\\mekongcy_hrm.sql';
$output_file = 'c:\\Users\\oeun_\\Downloads\\attendence\\fix_attendance_import.sql';

$emp_map = [
    '3' => '8',
    '4' => '9',
    '5' => '10',
    '6' => '11'
];
$target_branch_id = '27';
$target_company_id = '20';

$sessions = [];
$logs = [];

$content = file_get_contents($source_file);

function parse_insert_rows($rows_str) {
    if (!$rows_str) return [];
    $rows = [];
    $len = strlen($rows_str);
    $in_string = false;
    $depth = 0;
    $current_row = '';
    
    for ($i = 0; $i < $len; $i++) {
        $c = $rows_str[$i];
        
        // Handle escaped quotes
        if ($c === "'" && ($i === 0 || $rows_str[$i-1] !== "\\")) {
            $in_string = !$in_string;
        }
        
        if (!$in_string) {
            if ($c === '(') {
                $depth++;
                if ($depth === 1) {
                    $current_row = '';
                    continue;
                }
            } elseif ($c === ')') {
                $depth--;
                if ($depth === 0) {
                    $rows[] = $current_row;
                    continue;
                }
            }
        }
        
        if ($depth > 0) {
            $current_row .= $c;
        }
    }
    return $rows;
}

// Better way to find INSERT statements: split by 'INSERT INTO'
$parts = explode('INSERT INTO ', $content);
foreach ($parts as $part) {
    if (empty($part)) continue;
    
    // Part looks like: `table_name` (...columns...) VALUES (...data...);
    if (preg_match('/^`([^`]+)`\s*(?:\((?:[^)]+)\))?\s*VALUES\s+/is', $part, $m)) {
        $table = $m[1];
        
        // Find the END of the VALUES block. It ends with ; at the end of a line or end of part.
        // But some strings might have ;. Semicolon at end of statement is usually followed by \n
        $end_pos = strrpos($part, ';');
        if ($end_pos === false) continue;
        
        $values_start = strlen($m[0]);
        $values_str = substr($part, $values_start - 1, $end_pos - $values_start + 1);
        
        if ($table === 'attendance_sessions') {
            $rows = parse_insert_rows($values_str);
            foreach ($rows as $row) {
                $fields = str_getcsv($row, ',', "'", "\\");
                if (count($fields) >= 11) {
                    $emp_id = trim($fields[1]);
                    if (isset($emp_map[$emp_id])) {
                        $sessions[] = [
                            'employee_id' => $emp_map[$emp_id],
                            'attendance_date' => $fields[3],
                            'late_minutes' => $fields[4],
                            'early_leave_minutes' => $fields[5],
                            'work_minutes' => $fields[6],
                            'overtime_minutes' => $fields[7],
                            'has_fake_gps_flag' => $fields[8],
                            'created_at' => $fields[9],
                            'updated_at' => $fields[10],
                        ];
                    }
                }
            }
        }
        
        if ($table === 'attendance_logs') {
            $rows = parse_insert_rows($values_str);
            foreach ($rows as $row) {
                $fields = str_getcsv($row, ',', "'", "\\");
                if (count($fields) >= 13) {
                    $emp_id = trim($fields[2]);
                    if (isset($emp_map[$emp_id])) {
                        $logs[] = [
                            'employee_id' => $emp_map[$emp_id],
                            'scan_type' => $fields[4],
                            'scanned_at' => $fields[5],
                            'latitude' => $fields[6],
                            'longitude' => $fields[7],
                            'distance_from_branch' => $fields[8],
                            'device_info' => $fields[9],
                            'ip_address' => $fields[10],
                            'qr_token' => $fields[11],
                            'created_at' => $fields[12],
                            'updated_at' => $fields[13],
                        ];
                    }
                }
            }
        }
    }
}

$output = "-- Transformed attendance data\n";
$output .= "SET FOREIGN_KEY_CHECKS = 0;\n\n";

$output .= "-- Insert attendance_sessions\n";
$output .= "INSERT IGNORE INTO `attendance_sessions` (`employee_id`, `branch_id`, `attendance_date`, `late_minutes`, `early_leave_minutes`, `work_minutes`, `overtime_minutes`, `has_fake_gps_flag`, `created_at`, `updated_at`, `company_id`) VALUES\n";
$vals = [];
foreach ($sessions as $s) {
    $vals[] = "({$s['employee_id']}, $target_branch_id, '{$s['attendance_date']}', {$s['late_minutes']}, {$s['early_leave_minutes']}, {$s['work_minutes']}, {$s['overtime_minutes']}, {$s['has_fake_gps_flag']}, '{$s['created_at']}', '{$s['updated_at']}', $target_company_id)";
}
$output .= implode(",\n", $vals) . ";\n\n";

$output .= "-- Insert attendance_logs\n";
if (!empty($logs)) {
    $output .= "INSERT INTO `attendance_logs` (`attendance_session_id`, `employee_id`, `branch_id`, `scan_type`, `scanned_at`, `latitude`, `longitude`, `distance_from_branch`, `device_info`, `ip_address`, `qr_token`, `created_at`, `updated_at`, `company_id`) VALUES\n";
    $vals = [];
    foreach ($logs as $l) {
        $date_only = explode(' ', $l['scanned_at'])[0];
        $session_lookup = "(SELECT id FROM attendance_sessions WHERE employee_id = {$l['employee_id']} AND attendance_date = '{$date_only}' LIMIT 1)";
        $device = str_replace("'", "''", $l['device_info']);
        $vals[] = "($session_lookup, {$l['employee_id']}, $target_branch_id, '{$l['scan_type']}', '{$l['scanned_at']}', '{$l['latitude']}', '{$l['longitude']}', '{$l['distance_from_branch']}', '{$device}', '{$l['ip_address']}', '{$l['qr_token']}', '{$l['created_at']}', '{$l['updated_at']}', $target_company_id)";
    }
    $output .= implode(",\n", $vals) . ";\n\n";
}

$output .= "SET FOREIGN_KEY_CHECKS = 1;\n";

file_put_contents($output_file, $output);
echo "Generated " . count($sessions) . " sessions and " . count($logs) . " logs in $output_file\n";
