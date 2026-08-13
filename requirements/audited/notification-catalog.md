# NOTIFICATION CATALOG (V2 — AUDITED)

**Version:** 2.0.0 | **Date:** 2026-08-13 | Part of `requirements/audited/`
**Purpose:** Canonical notification list. Corrects "40+ notifications" inflation (CONFLICT-005); reconciles 36 discovered, 13 catalogued client, and 32 generic notifications.

---

## 1. CLIENT-CATALOGUED NOTIFICATIONS (13 — NOTIF-001..013)

| ID | Notification | Trigger | Recipients | Priority |
|---|---|---|---|---|
| NOTIF-001 | Mortality Threshold | daily mortality > configured threshold (e.g., 0.5%) | Farm Mgr, Owner (per catalog; CONFLICT-027) | High |
| NOTIF-002 | Feed Stock Low | feed below minimum level | Farm Mgr, Warehouse | High |
| NOTIF-003 | Payment Overdue | dealer payment overdue | Sales, Accounts | High |
| NOTIF-004 | Vaccine Due | due date approaching | Supervisor, Farm Mgr | Medium |
| NOTIF-005 | Medicine Expiry | expires in 30 days | Warehouse, Vet | Medium |
| NOTIF-006 | Poor FCR | batch FCR above target | Farm Mgr, Owner | High |
| NOTIF-007 | Low Weight/Yield | weekly avg weight below target / yield below expected | Farm Mgr | High |
| NOTIF-008 | Egg Rate Change | selling rate changed | Sales, Customers [F] | Medium |
| NOTIF-009 | Egg Stock Shortage | order exceeds available stock | Sales Mgr | High |
| NOTIF-010 | High Wastage/Return | wastage/returns above threshold | Manager | Medium |
| NOTIF-011 | Vehicle Breakdown | vehicle reported breakdown | Fleet, Sales | High |
| NOTIF-012 | Supplier Quality | repeated supplier quality issues | Purchase Mgr | Medium |
| NOTIF-013 | Processing Bottleneck | queue backlog / throughput below plan | Processing, Owner | Medium |

---

## 2. DISCOVERED-IN-CONVERSATION NOTIFICATIONS (additional 23 — to merge into catalog)

Abnormal Growth (weekly avg weight vs target) · Credit Limit Exceeded (dealer order) · Rate Change Alert (e.g., Large Egg rate X→Y) · Stock Shortage Alert (order vs stock) · Yield Variance Alert (actual < expected) · Weight Reconciliation Alert (input ≠ outputs) · Underweight Warning (final wt < requested) · Processing Reconciliation Failure · Vehicle Capacity Exceeded · Credit Limit Warning · Minimum Order Quantity Alert · Storage Expiry Warning (cold storage shelf-life) · Abnormal Stock Loss (mismatch > threshold → Management) · Capacity Shortage [F] · Exception Alerts (high mortality, overdue, low margin → Owner) · Seasonal Demand Warning (2-3 months prior) · Slow Moving Alert (last sold > threshold) · Overstock Alert (stock vs avg monthly sales) · Stock-Out Prediction (depletion run-rate) · Predictive Alerts (feed depletion → Farm Mgr) · Negative Margin Warning · Price Anomaly Alert · Customer Inactive Alert (no order 30-45 days) · Production Loss Trend (consecutive days) · Abnormal Feed Consumption · Abnormal Sales Alert (spikes) · Order Status (SMS/WhatsApp to customers) [F] · Fuel Anomaly Warning · Environmental Alert (temp/humidity) [F].

---

## 3. GENERIC NOTIFICATION CATALOG (32 — NTF-1001..NTF-7003, docs/13-notifications)

### Mortality & Health (5)
NTF-1001 High Daily Mortality (>0.5% configurable; Critical; Farm Mgr, Vet; Push/SMS) · NTF-1002 Cumulative Mortality Warning (> breed curve +2%; High) · NTF-1003 Vaccination Due (24h before; Medium) · NTF-1004 Vaccination Missed (end of day; High) · NTF-1005 Disease Incident Logged (High)

### Feed & Water (5)
NTF-2001 Low Feed Stock (<2 days consumption; High) · NTF-2002 Abnormal Feed Consumption Low (<80% standard; Critical) · NTF-2003 Abnormal Feed Consumption High (>120%; Medium) · NTF-2004 Water Drop (>20% vs prev day; High) · NTF-2005 Feed Mill RM Low (High)

### Layer/Breeder (3)
NTF-3001 Egg Production Drop (>5%; Critical) · NTF-3002 Low Hatchability (<80% configurable; High) · NTF-3003 Egg Weight Variance (>10%; Medium)

### Broiler (2)
NTF-3101 Low Body Weight (<90% standard; High) · NTF-3102 High CV/Uniformity (CV>12%; Medium)

### Financial & Commercial (6)
NTF-4001 Credit Limit Exceeded (High) · NTF-4002 Overdue Payment (>30 days; Medium) · NTF-4003 Payment Received (Low) · NTF-4004 Vendor Invoice Due (3 days; Medium) · NTF-4005 PO Approval Pending (>24h; Medium) · NTF-4006 High Batch Cost Variance (>10%; High)

### Inventory (4)
NTF-5001 Reorder Level Reached (Medium) · NTF-5002 Stock Expiring (30 days; High) · NTF-5003 Stock Expired (Critical; auto-blocks issue) · NTF-5004 High Physical Variation (>5%; High)

### Workflow & Ops (4)
NTF-6001 Daily Entry Missed (10:00 AM; High; Push/SMS) · NTF-6002 Batch Liquidation Ready (target age; Medium) · NTF-6003 Shed Readiness Incomplete (2 days before DOC; High) · NTF-6004 Dispatch Vehicle Arrived (Low)

### System (3)
NTF-7001 Failed Sync (48h; High) · NTF-7002 Integration Error IoT/Weighbridge (Critical) · NTF-7003 Backup Failure (Critical)

---

## 4. CORRECTED COUNTS

| Metric | v1 (incorrect) | V2 |
|---|---|---|
| Generic catalog | "40+" (exec summary) | 32 (NTF-1001..7003) |
| Client catalog | 13 | 13 (NOTIF-001..013) + 23 pending merge |
| Discovered in conversation | 36 | 36 (all quoted above) |

---

## 5. DELIVERY REQUIREMENTS

- **Channels:** In-app Push (primary), SMS (fallback/urgent), WhatsApp [FUTURE], Email (reports).
- **Priority levels:** Info / Medium / High / Critical — routing rules per priority.
- **Architecture:** async queue via Redis/BullMQ with generic workers (ADR-012).
- **Language:** Tamil-first content; message templates configurable (NotificationTemplate entity).
- **Batching/quotas:** SMS/WhatsApp cost limits per plan [PROPOSED — gap].
- **Health escalation matrix:** as per health-rules (Critical→4h, High→12/24h, Medium→48h).

---

*End of notification-catalog.md (V2).*