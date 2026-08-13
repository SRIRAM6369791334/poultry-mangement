# Weight Reconciliation & Yield Management

## 1. Fundamental Equation [CONFIRMED]
The system must enforce and validate the following reconciliation formula for every processing batch and order (CLIENT-097, CLIENT-123, CLIENT-126):
**Input Live Weight = Saleable Product + By-products + Waste + Processing Loss**

## 2. Yield Management [CONFIRMED]
- **Yield Calculation**: Yield % = (Saleable Weight / Input Live Weight) × 100.
- **Example**: 1.35 kg live bird yielding 1.00 kg meat equals a 74.07% yield (CLIENT-100, CLIENT-101).
- **Expected Yields**: The company defines expected yield percentages per species and product form.
- **Alerts**: The system must trigger alerts if the actual yield falls significantly below or above the expected yield parameters.

## 3. Per-Order Weight Tracking [CONFIRMED]
For every order, the following metrics must be recorded and visible (CLIENT-115):
- Requested Weight (Customer order)
- Input Live Weight (Actual birds used)
- Processing Loss (Categorized)
- Expected Yield
- Actual Yield
- Final Saleable Weight
- Accepted Weight (by customer)
- Rejected Weight (if any)
- Excess/Short Weight

## 4. Overweight & Underweight Handling [CONFIRMED]
- **Scenario (CLIENT-083, CLIENT-086)**: A customer requests 1 kg. A 1.35 kg bird yields 1.02 kg. Multiple birds may be used for larger orders (e.g., 5 kg order fulfilled with 4 birds).
- **Overweight**: If the final weight is higher than requested, the system prompts: Customer accepts (and is billed for) the excess, OR the excess is trimmed and returned to stock (CLIENT-084).
- **Underweight**: If the final weight is lower, the system warns the processor. The processor must add an additional piece or negotiate a replacement/short bill with the customer (CLIENT-085).

## 5. Mismatch & Loss Alerts [CONFIRMED]
- **Reconciliation Report**: A daily report must summarize input vs. output weights across the processing center (CLIENT-126).
- **Abnormalities**: The system must detect missing weight (theft/unrecorded loss) or excess weight (data entry error/water retention) and flag it for supervisor review.
- **Transport Weight Loss**: The system must account for weight lost during transport (shrinkage) between the farm and the processing center, keeping it distinct from processing loss (CLIENT-087).
