# Non-Functional Requirements (NFR) Catalog

## Scale Scenarios
1. **Small Farm**: 1 farm, 5 users, 10 batches/year, ~1,000 daily records.
2. **Medium Org**: 5 farms, 20 users, 100 batches/year, ~20,000 daily records.
3. **Enterprise**: 50+ farms, 200+ users, 1000+ batches/year, ~500,000 daily records, Feed Mill operations.

## Performance Requirements
- **NFR-1001 (Page Load)**: All core SPA pages must render within < 2 seconds on a 3G mobile network.
- **NFR-1002 (API Latency)**: 95th percentile of API responses must be < 500ms under normal load.
- **NFR-1003 (Report Generation)**: Standard reports (e.g., Batch P&L) must generate in < 10 seconds. Massive data exports handled asynchronously.
- **NFR-1004 (Offline Sync)**: Mobile app must sync 1 week of offline data in < 15 seconds upon reconnecting.

## Scalability Requirements
- **NFR-2001 (Tenancy)**: Architecture must support scaling horizontally to 1,000+ active tenants without degradation of isolated performance.
- **NFR-2002 (Data Volume)**: System must remain performant with 10M+ daily records in the time-series database.
- **NFR-2003 (Concurrency)**: Support at least 1,000 concurrent user sessions performing write operations (daily entries) in the Enterprise scenario.

## Availability & Reliability
- **NFR-3001 (Uptime)**: System guarantees 99.9% uptime (approx. 43 minutes of allowed downtime per month), excluding scheduled maintenance.
- **NFR-3002 (Fault Tolerance)**: No single point of failure. Microservices must degrade gracefully (e.g., if SMS provider fails, app continues working and queues SMS).

## Backup & Recovery
- **NFR-4001 (RPO)**: Recovery Point Objective < 1 hour. Maximum data loss in catastrophic failure is 1 hour.
- **NFR-4002 (RTO)**: Recovery Time Objective < 4 hours. System fully restored and operational within 4 hours.
- **NFR-4003 (Retention)**: Daily backups retained for 30 days; Weekly for 1 year; Yearly indefinitely.

## Security & Compliance
- **NFR-5001 (Encryption)**: Data at rest encrypted using AES-256. Data in transit encrypted via TLS 1.2+.
- **NFR-5002 (Authentication)**: Support for MFA (Multi-Factor Authentication) and robust JWT-based session management.
- **NFR-5003 (Audit)**: All insert/update/delete operations on financial and inventory records must generate an immutable audit log.

## Maintainability & Logging
- **NFR-6001 (Monitoring)**: System must emit standardized health metrics. Alerts trigger automatically if CPU > 80% or 5xx errors > 1%.
- **NFR-6002 (Log Retention)**: Application logs retained for 90 days in hot storage, 1 year in cold storage.

## Data Retention
- **NFR-7001 (Archival)**: Production data older than 3 years is moved to cold storage but remains queryable via asynchronous reporting.

## Caching Strategy
- **NFR-8001 (Read Heavy Data)**: Breed standards, tenant configurations, and user permissions must be cached in Redis with appropriate TTLs to reduce DB load.

## Search
- **NFR-9001 (Full-Text Search)**: Global search across invoices, batches, and inventory items must return results in < 1 second using Elasticsearch/OpenSearch.
