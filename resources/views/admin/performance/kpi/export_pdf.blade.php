<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>KPI Master List</title>
    <style>
        body { font-family: 'Helvetica', 'Arial', sans-serif; color: #333; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #ccc; padding-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #e2e8f0; padding: 8px; text-align: left; font-size: 13px; }
        th { background: #f1f5f9; color: #475569; font-weight: bold; }
        .category-row td { background: #e2e8f0; font-weight: bold; }
        .text-center { text-align: center; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Company KPI List</h2>
    </div>

    <table>
        <thead>
            <tr>
                <th>KPI Name</th>
                <th>Description</th>
                <th class="text-center">Weight</th>
                <th class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
            <tr class="category-row">
                <td colspan="4">{{ $category->name }}</td>
            </tr>
                @foreach($category->kpis as $kpi)
                <tr>
                    <td>{{ $kpi->name }}</td>
                    <td>{{ $kpi->description }}</td>
                    <td class="text-center">{{ $kpi->weight }}%</td>
                    <td class="text-center">{{ $kpi->is_active ? 'Active' : 'Inactive' }}</td>
                </tr>
                @endforeach
            @empty
            <tr><td colspan="4" class="text-center">No KPIs defined.</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
