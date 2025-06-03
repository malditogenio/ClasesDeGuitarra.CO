ClasesDeGuitarra.CO
===================

Proyecto Marketplace de clases de guitarra MVP

## Malware scanning

Run `scan_for_malware.sh` from the repository root to perform a quick search for suspicious PHP functions. If `clamav` is installed, the script will also attempt an antivirus scan.

### Example

```bash
./scan_for_malware.sh
```

Ensure the ClamAV virus database is up to date by running `freshclam` before executing the scan.
