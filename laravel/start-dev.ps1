# Egykattintásos PowerShell indító Laravel + Vite fejlesztéshez
param()
Set-Location $PSScriptRoot
if (-not (Test-Path ./artisan)) {
  Write-Host 'Hibás mappa: artisan nem található.' -ForegroundColor Red
  exit 1
}

Write-Host '=== Laravel fejlesztői szerver indítása ===' -ForegroundColor Cyan
Start-Process powershell -ArgumentList '-NoExit','-Command','php artisan serve'
Start-Sleep -Seconds 2

Write-Host '=== Vite asset szerver indítása ===' -ForegroundColor Cyan
Start-Process powershell -ArgumentList '-NoExit','-Command','npm run dev'

Write-Host 'Kész. Elérési pontok:' -ForegroundColor Green
Write-Host 'Backend: http://127.0.0.1:8000' 
Write-Host 'Vite:    http://localhost:5173'
