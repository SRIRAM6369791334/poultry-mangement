# Testing Strategy

## 1. Testing Pyramid
Our strategy follows the standard testing pyramid to ensure a balanced approach to quality:
- **Manual Testing (5%)**: Exploratory testing, usability testing, and complex edge case validation.
- **End-to-End (E2E) Testing (15%)**: Validating complete business workflows across multiple modules.
- **Integration Testing (30%)**: Verifying interactions between internal modules, database, and external integrations.
- **Unit Testing (50%)**: Isolating and testing individual functions, especially critical calculations and business logic.

## 2. Test Categories
### Functional Testing
Validating each module independently (e.g., Inventory, Flock Management, Finance).
### Workflow Testing
Testing end-to-end flows such as Day Old Chick (DOC) arrival to final bird sale.
### Calculation Testing
Rigorous testing of all formulas: Feed Conversion Ratio (FCR), Mortality %, Egg Production %, Cost of Production, and Financials.
### Financial Testing
Validating invoice generation, payment processing, tax calculations (GST/VAT), and Profit & Loss accuracy.
### Permission Testing
Role-Based Access Control (RBAC) enforcement across different user roles (Admin, Farm Manager, Supervisor).
### Multi-tenant Testing
Ensuring strict data isolation between different client organizations.
### Data Integrity Testing
Verifying referential integrity, constraints, and accurate state transitions.
### Performance Testing
Validating system behavior under load, stress testing, and concurrent user access.
### Security Testing
OWASP Top 10 vulnerabilities, penetration testing, data encryption validation.
### Mobile/Offline Testing
Testing offline data entry, synchronization logic, and conflict resolution for field apps.
### API Testing
Validating API contracts, payload validation, and error handling for external consumers and mobile apps.

## 3. Critical Test Scenarios (50+)
1. **Flock Setup**: Create a new batch with valid data.
2. **Flock Setup**: Attempt to create a batch in an already occupied shed.
3. **Flock Setup**: Assign birds exceeding shed capacity.
4. **Daily Entry**: Record daily mortality, feed, and weight.
5. **Daily Entry**: Attempt to record mortality exceeding live bird count.
6. **Daily Entry**: Attempt to record daily entry for a future date.
7. **Daily Entry**: Enter negative values for feed consumption.
8. **Calculations**: Validate FCR calculation (Total Feed / Total Weight Gain).
9. **Calculations**: Validate daily and cumulative mortality percentages.
10. **Calculations**: Validate Egg Production % (Total Eggs / Live Hen Count).
11. **Inventory**: Receive feed stock with valid PO.
12. **Inventory**: Attempt to issue feed exceeding current stock.
13. **Inventory**: Validate stock deductions after daily feed entry.
14. **Inventory**: Perform physical stock adjustment (positive and negative).
15. **Inventory**: Attempt to use expired medication.
16. **Sales**: Create bird sale invoice with valid pricing.
17. **Sales**: Attempt to sell more birds than currently alive.
18. **Sales**: Validate average weight calculation during sale.
19. **Sales**: Validate tax calculation on invoice.
20. **Finance**: Receive full payment for an invoice.
21. **Finance**: Receive partial payment and check outstanding balance.
22. **Finance**: Process expense entry and validate P&L impact.
23. **Finance**: Validate Cost of Production per bird (Total Cost / Total Live Weight).
24. **Health**: Schedule vaccination program for a new batch.
25. **Health**: Trigger alert for missed vaccination.
26. **Health**: Record medication with withdrawal period.
27. **Health**: Attempt to sell birds during medication withdrawal period.
28. **Hatchery**: Set eggs in incubator.
29. **Hatchery**: Record candling results (infertile/dead embryos).
30. **Hatchery**: Record hatch output and validate hatchability percentage.
31. **Multi-tenant**: User logs in and only sees their organization's data.
32. **Multi-tenant**: Attempt to access another tenant's ID via API manipulation.
33. **Permissions**: Farm Manager creates daily entry.
34. **Permissions**: Supervisor attempts to view financial reports (should be denied).
35. **Permissions**: Admin configures global settings.
36. **Offline**: Enter daily data offline and sync when online.
37. **Offline**: Resolve conflict when two offline devices sync contradictory data for the same shed/date.
38. **Edge Cases**: Batch merge (combining two batches).
39. **Edge Cases**: Batch split (moving part of a batch to another shed).
40. **Edge Cases**: Backdated mortality entry and recalculation of subsequent days' FCR.
41. **Integrations**: Send SMS alert for high mortality.
42. **Integrations**: Sync financial data to Tally/QuickBooks.
43. **Integrations**: Receive IoT temperature data and trigger alert if out of bounds.
44. **Performance**: Generate comprehensive P&L report for 50 farms under 10 seconds.
45. **Performance**: Simulate 500 concurrent users entering daily data.
46. **Data Integrity**: Attempt to delete a feed item that is linked to historical daily entries.
47. **Data Integrity**: Close a batch and ensure no further daily entries can be added.
48. **Security**: Test SQL injection on search inputs.
49. **Security**: Test XSS on text input fields.
50. **Security**: Validate JWT token expiry and refresh flow.

## 4. Test Data Strategy
- **Seed Data**: Scripts to generate standardized breeds, feed types, medicines, and typical farm configurations.
- **Factory Patterns**: Use libraries (e.g., Faker, FactoryBot) to dynamically generate randomized but valid batch data.
- **Time-Series Simulation**: Scripts to simulate 40-day broiler cycles or 72-week layer cycles with realistic daily variances in mortality and feed.
- **Anonymized Production Data**: For performance testing, scrubbed databases from production (removing PII) to test against real-world scale.

## 5. Regression Testing
- **Automated CI/CD**: All unit and integration tests run on every Pull Request.
- **Nightly E2E Runs**: Full suite of E2E tests runs nightly against the staging environment.
- **Visual Regression**: Snapshot testing for critical UI components (e.g., reports, dashboards).
- **Test Coverage Gates**: Minimum 80% code coverage required for backend logic, especially calculations.

## 6. Testing Tools
- **Unit Testing**: Jest (Frontend/Node.js), PyTest/JUnit (Backend)
- **Integration/API Testing**: Postman/Newman, REST Assured
- **E2E Testing**: Cypress or Playwright
- **Performance Testing**: k6, JMeter
- **Security Testing**: OWASP ZAP, SonarQube
- **Mobile Testing**: Appium
