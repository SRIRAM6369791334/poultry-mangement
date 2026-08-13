# Mobile & Offline Requirements (AG-12)

The Poultry Management ERP requires a robust mobile solution, primarily for farm-level operations where internet connectivity is often poor or non-existent.

## 1. Primary Mobile Use Cases (Mobile-Critical Workflows)
The mobile app is designed for "point-of-work" data capture:
* **Daily Routines:** Mortality entry, feed consumption, egg collection.
* **Health & Growth:** Weekly sample body weight recording, vaccination confirmation.
* **Audits & Checks:** Farm inspection checklists, shed readiness verification.
* **Media Capture:** Photographing dead birds (for PM review), scanning feed bag barcodes (inventory tracking).
* **Dispatch/Gate:** Capturing weighbridge slips, marking vehicle dispatch.

## 2. Offline Mode & Sync Strategy

### 2.1 Offline Data Availability (Read)
When opening the app without connectivity, the user must be able to view:
* Active batches in their assigned farm.
* Today's task list (Vaccinations, feeding targets).
* Historical data for the current batch (last 7 days of mortality/feed) to spot trends locally.

### 2.2 Offline Data Capture (Write)
The user must be able to record all daily operations (mortality, feed, weight, eggs) completely offline.

### 2.3 Sync Strategy & Conflict Resolution
* **Queue Management:** All offline entries are stored in a local SQLite/IndexedDB queue.
* **Background Sync:** The app listens for connectivity (Network Status API) and auto-syncs payload in the background.
* **Conflict Resolution Strategy:** 
  * *Latest Wins (Device Timestamp)* for scalar updates (e.g., updating a temperature reading).
  * *Additive/Append* for transactional data (e.g., entering mortality).
  * If a farm manager updates data on the web simultaneously, the server retains a version history, flagging conflicts for the manager to review (Web UI).

### 2.4 Data Priority During Sync
In low-bandwidth situations, payloads are prioritized:
1. **Critical/Text Data:** Mortality numbers, feed consumed, disease alerts (KB size).
2. **Transactional Data:** Material issue requests.
3. **Media:** Photos of birds/receipts (MB size, deferred until Wi-Fi or strong 4G).

## 3. Device Feature Utilization
* **Camera:** 
  * Post-mortem photo capture (auto-tagged with Batch ID and Date).
  * Scanning physical invoices/receipts for expenses.
* **QR/Barcode Scanner:** 
  * Scanning feed bags/medicine boxes during receiving (GRN) and issuing to verify exact lot numbers and expiry.
* **GPS & Location:** 
  * Geofencing: Ensure the worker is actually at the shed when logging daily entries.
  * Tracking dispatch vehicles (driver app integration).
* **Push Notifications:** Reminders for missed entries or critical temperature alerts from IoT sensors.

## 4. Architecture Recommendation: PWA vs Native (React Native/Flutter)

**Recommendation: Cross-Platform Native (Flutter or React Native)**

*Why not PWA?* 
While PWAs are great, iOS still has limitations with background sync, persistent storage quotas (service worker eviction), and deep hardware integration (precise barcode scanning, background location). Given that farm workers operate in harsh environments with spotty connections, the storage persistence and background sync reliability of a Native App (using SQLite and WorkManager/BackgroundFetch) is mandatory.

*Trade-offs:*
* Higher development overhead than a PWA.
* Requires App Store/Play Store deployment (or MDM side-loading for enterprise).

## 5. Bandwidth & Performance Considerations (Rural Areas)
* **Payload Size:** All API JSON payloads for daily sync must be minified. A typical daily sync for one shed should be under 50KB.
* **Pagination & Limits:** Do not sync full historical reports to mobile. Limit offline history to 7-14 days.
* **Image Compression:** All camera photos must be aggressively compressed (e.g., WebP or low-res JPEG, < 200KB per image) *before* being queued for upload.
* **Resilient Uploads:** Use resumable uploads for media files (TUS protocol) so a dropped edge connection doesn't force restarting a photo upload from 0%.
