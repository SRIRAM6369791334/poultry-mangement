# Finance & Accounting Module

## 1. Overview
The Finance & Accounting module is designed to provide comprehensive financial tracking tailored to the poultry industry. It scales from small independent farms using cash basis accounting to large enterprise integrators requiring complex cost center allocation, batch-level costing, and multi-currency consolidation.

## 2. Chart of Accounts (CoA)
The system supports a hierarchical, customizable Chart of Accounts. Below is a suggested structure specifically for poultry operations.

### Standard Poultry CoA Structure
*   **Assets (1000)**
    *   1100 - Current Assets (Cash, Bank, Accounts Receivable, Inventory - Feed/Meds/Chicks)
    *   1200 - Fixed Assets (Land, Sheds, Equipment, Vehicles)
    *   1300 - Biological Assets (Breeder Flocks, Layer Flocks) [FACT: IAS 41 Agriculture standard]
*   **Liabilities (2000)**
    *   2100 - Current Liabilities (Accounts Payable, Short-term Loans, Accrued Payroll)
    *   2200 - Long-term Liabilities (Mortgages, Equipment Financing)
*   **Equity (3000)**
    *   3100 - Owner's Equity / Retained Earnings
*   **Income (4000)**
    *   4100 - Bird Sales (Broiler, Culls)
    *   4200 - Egg Sales (Table, Hatching)
    *   4300 - Manure/Litter Sales
    *   4400 - Feed Mill Sales (if selling externally)
*   **Expenses (5000)**
    *   5100 - Direct Cost of Goods Sold (DOC Cost, Feed Consumed, Vaccines, Medicines)
    *   5200 - Farm Operating Expenses (Labor, Electricity, Water, Litter Material, Heating)
    *   5300 - Overheads (Admin, Sales, Marketing, Depreciation)

## 3. Cost Centers
To ensure granular profitability tracking, the system utilizes a multi-tier cost center hierarchy:
**Organization → Company → Branch/Zone → Farm → Shed → Batch/Flock**

*   **Batch/Flock** is the lowest level of direct cost accumulation.
*   **Shed/Farm** is used for allocating indirect costs (e.g., electricity for the whole farm) which are then apportioned to active batches based on bird days or head count.

## 4. Accounts Payable (AP) & Expense Management
### AP Workflow
1.  **Purchase Invoice Registration:** Link to GRN (Goods Receipt Note) for feed/chicks.
2.  **Payment Scheduling:** Track due dates, aging summary (0-30, 31-60, 61-90, 90+ days).
3.  **Payment Execution:** Apply payments against specific invoices or as advance.

### Expense Management
*   **Direct Farm Expenses:** Booked directly to a Shed/Batch (e.g., specific vaccines).
*   **Indirect Expenses:** Booked to Farm/Branch (e.g., security guard salary) and allocated at period end.
*   **Approval Workflow:** Multi-tier approval based on expense amount.

## 5. Accounts Receivable (AR) & Receipts
### AR Workflow
1.  **Customer Invoices:** Generated upon sales dispatch (birds, eggs, manure).
2.  **Collection Tracking:** Credit limits, aging reports.
3.  **Receipts:** 
    *   **Modes:** Cash, Bank Transfer, Cheque, UPI, Credit Note.
    *   **Application:** Receipt against specific invoice, partial payments, advance from traders.

## 6. Bank Reconciliation
*   **Statement Import:** CSV/MT940 formats.
*   **Matching:** Auto-match by date/amount and manual reconciliation for discrepancies.
*   **Journal Entries:** Direct entry creation for bank charges, interest, etc.

## 7. Journal Entries
*   **Manual Adjustments:** Standard double-entry journal vouchers for corrections.
*   **Period-End Entries:** Depreciation, accruals, prepayments, overhead allocations.

## 8. Batch Costing Engine
The core of poultry financial management is determining the exact cost of producing a batch.

### Cost Components
*   **Chick Cost:** Total DOC received × Price per DOC.
*   **Feed Cost:** Total feed consumed (bags/kg) × Average moving cost of feed.
*   **Medicine & Vaccine Cost:** Issued quantities × Unit cost.
*   **Labor Cost:** Direct farm labor assigned to the shed during the cycle.
*   **Overhead Allocation:** Farm electricity, heating, water, supervision allocated based on `Total Bird Days` of the batch.

### Output Metrics
*   **Total Batch Cost:** Sum of all direct and allocated costs.
*   **Cost Per Bird:** Total Batch Cost / Number of surviving birds sold.
*   **Cost Per Kg:** Total Batch Cost / Total Kg live weight sold.

> **Example Calculation [ASSUMPTION based on industry standard]:**
> * Batch: 10,000 birds. Survival: 9,500. Total Weight: 19,000 kg (2.0kg avg).
> * Costs: Chicks ($4,000) + Feed ($12,000) + Meds ($500) + Labor/Overhead ($1,500) = $18,000.
> * Cost per Bird: $18,000 / 9,500 = $1.89/bird
> * Cost per Kg: $18,000 / 19,000 = $0.94/kg

## 9. Profitability & P&L
### Farm Profitability (Batch Level)
*   **Revenue:** Total sales from the batch (Birds + Manure + Empty bags).
*   **Less Direct Costs:** (Calculated above).
*   **= Gross Margin per Batch.**

### Financial Statements
*   **P&L Statement:** Filterable by Organization, Farm, or Batch. Compares Revenue vs Expenses for a given period.
*   **Balance Sheet:** Assets vs Liabilities & Equity.
*   **Cash Flow Statement:** Operating, Investing, and Financing cash movements.
*   **Trial Balance:** Ensure debits equal credits before period closing.

## 10. Tax Management [OPEN_RESEARCH_ITEM - Localization]
*   **Configurable Tax Engine:** Support for GST (India), VAT (UK/Middle East), Sales Tax (US).
*   **Exemptions:** Agriculture/Livestock often have specific tax exemptions or zero-ratings depending on the jurisdiction. The system must allow item-level tax mapping.

## 11. Period Closing
*   **Monthly Close:** Hard lock on previous month's transactions, auto-calculation of depreciation, inventory valuation adjustments (FIFO/Weighted Average).
*   **Year-End Close:** Zeroing out P&L accounts to Retained Earnings.
