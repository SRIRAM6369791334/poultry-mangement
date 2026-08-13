# Module Architecture Requirements

## 1. Architectural Approach
**Recommendation: Modular Monolith**
Given Sri Murugan Poultry & Agro Group's scale (8 farms, 42 sheds, 85 employees, 120+ customers), a modular monolith architecture is recommended. 
- **[PROPOSED]** It provides the simplicity of a single deployment unit while maintaining clean boundaries between business domains (Farming, Processing, Sales, Finance, Inventory).
- **[FUTURE]** It allows for easier migration to microservices in the future if the business expands to complex layer, breeder, or feed mill operations.

## 2. High-Level Components
- **Core Domain Modules:** 
  - Farm Management (Sheds, Batches, FCR)
  - Processing (Yield calculation, Live vs. Processed weight)
  - Sales & Billing (B2B, B2C, Invoicing)
  - Inventory (Feed, Medicine, Equipment)
  - Finance (Cost tracking, Profitability, Payroll)
- **Shared/Platform Modules:**
  - IAM (Identity & Access Management, JWT-based)
  - Notification Engine (WhatsApp, SMS, Email)
  - Sync Engine (Offline mobile synchronization)
  - Analytics & Reporting (Real-time dashboard)

## 3. Component Interactions
- **[PROPOSED]** Modules must interact through well-defined internal APIs or domain events to avoid tight coupling. 
- The Sync Engine must orchestrate data flow between the mobile application (offline-first) and the core modules via a Conflict-Free Replicated Data Type (CRDT) or robust last-write-wins (with audit log) approach.

## 4. Multi-Tenant Data Partitioning
- **[FUTURE]** To accommodate future multi-company structures, the database schema must include a `tenant_id` (or `company_id`) in all foundational tables.
- Data queries must strictly scope results by the authenticated user's tenant ID context.
