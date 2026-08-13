# MVP Definition

This document outlines the scope, inclusions, and exclusions for the Minimum Viable Product (MVP) of the Poultry Management ERP.

## 1. MVP Scope
The MVP will focus exclusively on Phases 0-2 of the roadmap.
- **Phase 0**: Architecture Foundation (Multi-tenancy, RBAC, Core System Setup).
- **Phase 1**: Farm Management & Administration.
- **Phase 2**: Broiler Management (Batch lifecycle, feed, mortality, basic costing).

## 2. MVP Feature List
- **Administration**: Organization Setup, User Roles, Basic Master Data.
- **Farm Management**: Farm/Shed Registration, Farm Dashboard.
- **Broiler Operations**: Batch Creation/Closing, DOC Placement, Daily Environment Tracking.
- **Flock Metrics**: Daily Feed Consumption, Daily Mortality Recording, Sample Weighing.
- **Inventory (Basic)**: Feed Inventory tracking at the shed level.
- **Mobile Capabilities**: Basic responsive web app for field workers (Progressive Web App).
- **Basic Finance**: Simple Batch Costing (Input costs vs. bird sales).

## 3. MVP Excluded Features
The following are explicitly **NOT** in the MVP:
- Breeder and Hatchery Management
- Layer and Egg Production Management
- Feed Mill Management
- Full Enterprise Finance & HR/Payroll modules
- Contract Farming Automated Settlements
- Advanced AI/Predictive Analytics
- IoT Hardware Integrations
- Offline Native Mobile App (will use PWA instead for MVP)

## 4. MVP User Roles
- Super Admin (System management)
- Tenant Admin (Organization owner)
- Farm Manager (Farm oversight)
- Farm Supervisor / Worker (Data entry)

## 5. MVP Reports
- Daily Farm Performance Report (Feed, Mortality, Weight)
- Cumulative Batch Performance (FCR, EPEF)
- Shed Inventory Balance (Feed)
- Basic Batch P&L

## 6. MVP Success Criteria
- **Functional**: A farm manager can successfully create a batch, log daily data for 40 days, and close the batch with accurate FCR and Cost calculations.
- **Performance**: API response times under 200ms for core operational data entry.
- **Adoption**: Field workers can log daily data (feed, mortality) in under 2 minutes per shed using a mobile browser.
- **Stability**: Zero critical severity bugs (data loss or calculation errors) during UAT.

## 7. MVP Target Customer
**Independent Broiler Farms (1-10 sheds)**. These customers need immediate digitization from paper-based records to track FCR, mortality, and basic batch profitability without the overhead of enterprise ERP systems.

## 8. MVP Timeline
Estimated duration: **12-14 Weeks**
- Weeks 1-4: Phase 0 (Architecture & DB Setup)
- Weeks 5-8: Phase 1 (Admin & Farm Setup UI/APIs)
- Weeks 9-12: Phase 2 (Broiler Batch workflows & Reporting)
- Weeks 13-14: UAT, Bug Fixing, and Launch

## 9. MVP Technical Stack Recommendation
- **Backend**: Node.js with NestJS (Provides robust modular structure, great for multi-tenancy).
- **Database**: PostgreSQL (Relational integrity crucial for ERP) + Prisma ORM.
- **Frontend**: React.js with Tailwind CSS (Fast UI development, reusable components).
- **Mobile**: Responsive PWA (React) to avoid app store delays for MVP.
- **Infrastructure**: AWS (RDS, ECS) or Vercel/Render for rapid MVP deployment.
- **Justification**: This stack allows for rapid development (TS everywhere), handles relational ERP data well, and is easy to scale or transition to React Native post-MVP.
