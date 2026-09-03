PAVILION V7 PRODUCTION - APPROVED REV 13

This package promotes the approved Rev 13 V7 design to the live site root.

Deployment target: /home/pspt/public_html/
Canonical domain: https://pspt.ltd

Production changes from preview:
- Preview noindex/nofollow directives removed.
- Production page titles used.
- Canonical URLs point to the live root URLs.
- Existing V6 contact-handler.php retained for form processing.
- robots.txt and sitemap.xml retained for the production domain.
- .cpanel.yml deploys the V7 files to the live document root.

The v7-preview directory is not required by this production package and is not deleted by deployment.
