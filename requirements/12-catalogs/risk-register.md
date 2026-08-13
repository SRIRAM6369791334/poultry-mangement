# Risk Register

| Risk ID | Risk Description | Impact Level | Probability | Mitigation Strategy | Status |
|---------|------------------|--------------|-------------|---------------------|--------|
| RISK-001 | **Data Migration Quality:** Moving from manual paper registers to a digital system may lead to data entry errors for historical records. | High | High | Limit historical migration to opening balances and master data only. Do not migrate historical transactional data. | Open |
| RISK-002 | **Internet Connectivity:** Farms may have poor or intermittent internet connectivity, disrupting real-time entry. | High | Medium | Implement offline-first PWA for farm mobile app, with automatic syncing when connectivity is restored. | Open |
| RISK-003 | **User Adoption:** Farm workers may resist moving from WhatsApp/Paper to an application. | High | High | Build a highly simplified, vernacular (Tamil/English) mobile interface with large buttons and voice-to-text features. | Open |
| RISK-004 | **Hardware Failure:** Mobile devices provided to farm workers may break or be lost. | Medium | Medium | Provide ruggedized devices and maintain a small buffer stock of replacements. Allow login from any device. | Open |
| RISK-005 | **Integration Complexity:** Interfacing with the existing separate billing software might fail or cause data duplication. | Medium | Low | Ensure clear API contracts. If integration fails, propose full migration to the new system's native billing module. | Open |
| RISK-006 | **Scope Creep (Future Modules):** The client's future plans (Layer, Breeder, Hatchery, Feed Mill) might leak into phase 1 requirements. | High | Medium | Strictly gate phase 1 scope. Document all future requirements as [FUTURE] and defer to subsequent phases. | Open |
