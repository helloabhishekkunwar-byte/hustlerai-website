HUSTLERAI WEBSITE — CLEAN GITHUB COPY

IMPORTANT
- This is a source-code copy prepared for GitHub review/version control.
- It has NOT been deployed or tested against Razorpay.
- The original Hostinger ZIP and extracted source were not modified.
- No live/test Razorpay credentials are included in this repository copy.

FILES
- Preserved: index.html, default.php, checkout.php, payment-success.php, logo.png,
  assets/, api/create-order.php, api/verify-payment.php, api/.htaccess, README.txt.
- Excluded: api/config.php (contained a Razorpay Test Key ID and a secret placeholder),
  and the duplicate hustlerai_checkout_package/ directory.
- Added: api/secure-config.php (loads credentials from environment variables or
  a private PHP config file outside public_html) and
  razorpay-config.example.php (safe template with placeholders only).

RAZORPAY CONFIGURATION — HOSTINGER
The API endpoints now load api/secure-config.php, not api/config.php.

Preferred method:
1. Store HUSTLERAI_RAZORPAY_KEY_ID and HUSTLERAI_RAZORPAY_KEY_SECRET as server
   environment variables if your Hostinger PHP hosting setup supports them.
2. Use Test Mode credentials first. Never put the Key Secret in HTML or JavaScript.

Alternative private-file method:
1. In your hosting account, create a directory named "private" alongside
   "public_html" (not inside public_html).
2. Put a file named razorpay-config.php inside that private directory.
3. Use the contents of razorpay-config.example.php as the template and enter
   your actual Test Key ID and Key Secret in the private file only.
4. With the usual Hostinger layout, this loader expects:
   domains/hustlerai.in/private/razorpay-config.php
   alongside:
   domains/hustlerai.in/public_html/
5. Confirm the actual path in hPanel before using this method. Do not upload the
   private file to GitHub or into public_html.

TESTING / LIMITATIONS
- Fixed server-side workshop amount: INR 297 (29700 paise).
- PHP cURL and HTTPS are required.
- Payment success requires server-side signature verification and a captured
  payment status.
- The current code does not save customer leads to a database or send access
  emails/WhatsApp automatically.
- The checkout page displays a 30-day money-back guarantee. Keep this only if
  your published refund policy genuinely offers it.
- No deployment readiness is claimed. Before deployment, review the full
  site paths, PHP version, hosting filesystem layout, environment-variable
  support, database/email needs, and complete a successful Razorpay Test Mode
  transaction on a staging/test URL.

ORIGINAL WEBSITE
Keep your existing Hostinger website and original backup untouched until the
clean GitHub copy has been reviewed and independently tested.
