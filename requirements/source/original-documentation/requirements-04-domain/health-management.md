# Health & Medication Management

## 1. Overview
Managing flock health, vaccinations, and medication is critical for maintaining livability and compliance with food safety standards (withdrawal periods).

## 2. Disease Catalog [PROPOSED]
- The system must maintain a configurable master list of diseases (e.g., Newcastle, IB, IBD, Coccidiosis).
- Allows easy selection during mortality or diagnosis entry.

## 3. Vaccination Schedule Management [INFERRED]
- Configurable vaccination schedules based on bird type (e.g., Broiler schedule vs Layer schedule).
- Alerts/Reminders for upcoming vaccinations (Next Due Date).
- Recording of: Vaccine type, batch number, administration date, and method (water, spray, injection).

## 4. Medication Tracking & Inventory (CLIENT-012, CLIENT-013) [CONFIRMED]
**Process Flow:**
1. **Medicine Purchase:** Receipt of medicine increases Warehouse Stock.
2. **Diagnosis:** Vet or Supervisor logs disease, symptoms, and diagnosis.
3. **Prescription:** Medicine, dosage, and treatment period assigned.
4. **Treatment Application:** Administering medicine decreases Farm/Warehouse Stock automatically.

**Stock ↔ Usage Connection (CLIENT-013):**
- Medicine usage MUST be strictly tied to inventory reduction. You cannot record medication if stock is insufficient.

## 5. Withdrawal Period Enforcement [PROPOSED]
- **Withdrawal Period:** The number of days after treatment before a bird can be safely consumed.
- The system must **block or alert** if a batch is scheduled for harvest/dispatch while still within the medication withdrawal period.

## 6. Expiry Management [CONFIRMED]
- Tracking expiry dates of all vaccines and medicines upon GRN.
- Automated alerts for expired or soon-to-expire medicine.

## 7. Vet Recording Workflow [INFERRED]
- External or internal veterinarians should have a module to log visits, observations, post-mortem findings, and prescriptions directly linked to a specific farm and batch.
