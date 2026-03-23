# ============================================================
# Script: extract_data_only.ps1
# Purpose: Extract only INSERT statements from mekongcy_hrm.sql
#          (including multi-line INSERT blocks)
# ============================================================

$inputFile  = "$PSScriptRoot\mekongcy_hrm.sql"
$outputFile = "$PSScriptRoot\mekongcy_hrm_data_only.sql"

Write-Host "=== HRM Database Data Extractor ===" -ForegroundColor Cyan
Write-Host "Input  : $inputFile"
Write-Host "Output : $outputFile"
Write-Host ""

# ---- Read the source file ----
Write-Host "Reading source file..." -ForegroundColor Yellow
$lines = [System.IO.File]::ReadAllLines($inputFile)
Write-Host "Total lines: $($lines.Count)" -ForegroundColor Green

# ---- Prepare output writer ----
$writer = [System.IO.StreamWriter]::new($outputFile, $false, [System.Text.Encoding]::UTF8)

# ---- Write header ----
$writer.WriteLine("-- ============================================================")
$writer.WriteLine("-- Data-Only Import Script")
$writer.WriteLine("-- Extracted from: mekongcy_hrm.sql")
$writer.WriteLine("-- Generated: $(Get-Date -Format 'yyyy-MM-dd HH:mm:ss')")
$writer.WriteLine("-- ============================================================")
$writer.WriteLine("")
$writer.WriteLine("SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';")
$writer.WriteLine("START TRANSACTION;")
$writer.WriteLine("SET time_zone = '+00:00';")
$writer.WriteLine("SET NAMES utf8mb4;")
$writer.WriteLine("")
$writer.WriteLine("-- Disable foreign key checks to allow safe import")
$writer.WriteLine("SET FOREIGN_KEY_CHECKS = 0;")
$writer.WriteLine("")

# ---- Track state ----
$tablesFound    = [System.Collections.Generic.HashSet[string]]::new()
$insertCount    = 0
$inInsertBlock  = $false
$lastTable      = ""

# Regex patterns
$insertPattern  = [System.Text.RegularExpressions.Regex]::new('^INSERT INTO\s+`?(\w+)`?', [System.Text.RegularExpressions.RegexOptions]::IgnoreCase)
$createPattern  = [System.Text.RegularExpressions.Regex]::new('^(CREATE|ALTER|DROP|LOCK|UNLOCK|SET|--)', [System.Text.RegularExpressions.RegexOptions]::IgnoreCase)

Write-Host "Extracting INSERT statements..." -ForegroundColor Yellow

foreach ($line in $lines) {
    $trimmed = $line.Trim()

    # Skip empty lines when not in an INSERT block
    if ($trimmed -eq "") {
        if ($inInsertBlock) {
            $writer.WriteLine("")
        }
        $inInsertBlock = $false
        continue
    }

    # Check if this line starts a new INSERT INTO
    $match = $insertPattern.Match($line)
    if ($match.Success) {
        $tableName = $match.Groups[1].Value

        # Write section header for new table
        if ($tablesFound.Add($tableName)) {
            $writer.WriteLine("")
            $writer.WriteLine("-- ---------------------------------------------------------")
            $writer.WriteLine("-- Data for table: $tableName")
            $writer.WriteLine("-- ---------------------------------------------------------")
        }

        $writer.WriteLine($line)
        $insertCount++
        $inInsertBlock = $true
        $lastTable     = $tableName
        continue
    }

    # If we're inside an INSERT block, keep writing lines (VALUES rows)
    if ($inInsertBlock) {
        # Lines that are part of VALUES: start with ( or end with ), or (number, ...
        if ($trimmed.StartsWith("(") -or $trimmed.StartsWith("INSERT")) {
            $writer.WriteLine($line)
        } else {
            # No longer in INSERT block
            $inInsertBlock = $false
        }
        continue
    }

    # Skip all DDL and non-INSERT lines (CREATE TABLE, ALTER, SET, etc.)
    # These are intentionally ignored
}

# ---- Write footer ----
$writer.WriteLine("")
$writer.WriteLine("-- Re-enable foreign key checks")
$writer.WriteLine("SET FOREIGN_KEY_CHECKS = 1;")
$writer.WriteLine("")
$writer.WriteLine("COMMIT;")
$writer.WriteLine("")
$writer.WriteLine("-- ============================================================")
$writer.WriteLine("-- Import complete!")
$writer.WriteLine("-- Tables with data : $($tablesFound.Count)")
$writer.WriteLine("-- INSERT statements: $insertCount")
$writer.WriteLine("-- ============================================================")

$writer.Close()
$writer.Dispose()

# ---- Summary ----
Write-Host ""
Write-Host "=== Done! ===" -ForegroundColor Green
Write-Host "Tables extracted : $($tablesFound.Count)" -ForegroundColor Cyan
Write-Host "INSERT statements: $insertCount" -ForegroundColor Cyan
Write-Host ""
Write-Host "Tables found:" -ForegroundColor Yellow
foreach ($t in ($tablesFound | Sort-Object)) {
    Write-Host "  - $t" -ForegroundColor White
}
Write-Host ""

# Show file size
$size = (Get-Item $outputFile).Length / 1KB
Write-Host "Output file size : $([math]::Round($size, 1)) KB" -ForegroundColor Cyan
Write-Host "Output file      : $outputFile" -ForegroundColor Green
Write-Host ""
Write-Host "How to import:" -ForegroundColor Yellow
Write-Host "  Option 1: phpMyAdmin → Import → Choose file: mekongcy_hrm_data_only.sql" -ForegroundColor White
Write-Host "  Option 2: mysql -u username -p database_name < mekongcy_hrm_data_only.sql" -ForegroundColor White
