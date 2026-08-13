# Security & Permissions

[CONFIRMED] Based on CLIENT-039, CLIENT-036.

## 1. Role-Based Access Control (RBAC)
System must use a strict RBAC model where users are assigned roles, and roles have granular permissions (Create, Read, Update, Delete, Approve) on specific modules.

## 2. Farm-Level Data Isolation [CLIENT-036]
- **Owner / Admin:** Can view data across ALL farms and facilities.
- **Farm Manager / Staff:** Can ONLY view and interact with data for the specific farm(s) assigned to them. Cross-farm visibility must be strictly blocked at the application and API level.

## 3. Specific Data Restrictions [CLIENT-039]
- **Employee Salaries:** Not visible to Farm Workers, Supervisors, or standard managers. Restricted to HR, Senior Accounts, and Owner.
- **Purchase Rates/Vendor Pricing:** Hidden from general staff and warehouse workers. Visible only to Procurement, Accounts, and Owner.
- **Profitability Reports:** Strictly restricted to the Owner and explicitly authorized Senior Management.

## 4. Session & Authentication Security [PROPOSED]
- Password complexity requirements.
- Session timeouts for inactivity.
- Forced logouts on password changes or role modifications.
- OTP/2FA for Owner and Admin accounts.
