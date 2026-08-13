# Integration Catalog

## 1. Payment Gateways
- **Name**: Razorpay / Stripe
- **Category**: Required
- **Purpose**: Online payment collection from B2B buyers and dealers.
- **Direction**: Bidirectional
- **Method**: API & Webhooks (for payment success/failure)
- **Security**: PCI-DSS compliant iframe, HMAC webhook signature verification.

## 2. SMS Providers
- **Name**: Twilio / MSG91
- **Category**: Required
- **Purpose**: OTPs, transaction alerts, daily summary to farmers.
- **Direction**: Outbound
- **Method**: API
- **Error Handling**: Fallback provider if primary fails; retry queue for timeouts.

## 3. Email Delivery
- **Name**: SendGrid / AWS SES
- **Category**: Required
- **Purpose**: Invoices, scheduled reports, password resets.
- **Direction**: Outbound
- **Method**: API / SMTP

## 4. WhatsApp Business API
- **Name**: Meta / Gupshup
- **Category**: Required
- **Purpose**: Conversational alerts, sharing PDF invoices instantly.
- **Direction**: Bidirectional (Future: allow querying data via WA).
- **Method**: API & Webhooks

## 5. Accounting Software
- **Name**: Tally Prime / QuickBooks / Zoho Books
- **Category**: Required
- **Purpose**: Syncing ERP financial vouchers to standard accounting tools.
- **Direction**: Outbound / Bidirectional
- **Method**: API (Zoho/QB) / XML File Export (Tally)
- **Error Handling**: Idempotency keys to prevent duplicate journal entries.

## 6. IoT Sensors (Climate Control)
- **Name**: Various (e.g., Maximus, Rotem)
- **Category**: Optional (Premium)
- **Purpose**: Real-time shed temperature, humidity, ammonia levels.
- **Direction**: Inbound
- **Method**: MQTT / Webhooks
- **Data Exchanged**: Sensor ID, Timestamp, Metric, Value.

## 7. Weighing Scales (Digital Integration)
- **Name**: Avery / Local Serial RS232 Scales
- **Category**: Optional
- **Purpose**: Direct capture of bird weight during sale/transfer to prevent manual fraud.
- **Direction**: Inbound
- **Method**: Local Agent (Serial to Web Socket) / TCP/IP
- **Security**: Immutable data capture.

## 8. GPS / Fleet Tracking
- **Name**: GeoTab / LocoNav
- **Category**: Optional
- **Purpose**: Tracking feed delivery trucks and live bird transport.
- **Direction**: Inbound
- **Method**: API
- **Data Exchanged**: Vehicle ID, Lat/Lng, Speed, Status.

## 9. Tax Systems
- **Name**: GST Portal (India) / VAT (Middle East)
- **Category**: Required (Geo-specific)
- **Purpose**: E-Invoicing and automated tax return filing.
- **Direction**: Bidirectional
- **Method**: API (via GSP - GST Suvidha Provider)

## 10. Document Storage
- **Name**: AWS S3
- **Category**: Required
- **Purpose**: Storing attachments, generated PDFs, and profile images.
- **Direction**: Bidirectional
- **Method**: SDK/API

*(Additional integrations include Government Animal Health portals, Market Price Scrapers, Barcode/QR SDKs, Weather APIs, etc.)*
