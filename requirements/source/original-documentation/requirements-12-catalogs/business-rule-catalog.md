# Business Rule Catalog

| Rule ID | Rule Name | Description | Module | Source |
|---------|-----------|-------------|--------|--------|
| BR-001 | Transit Loss Billing | Live birds: Customer bears transit loss (billing on dispatch weight). Processed meat: Company bears transit loss (billing on delivered weight). | Sales / Finance | [CONFIRMED] |
| BR-002 | FCR Calculation | FCR = Total Feed Consumed (kg) / Total Live Weight Produced (kg). Standard target is < 1.6 for broilers. | Farm Ops | [INDUSTRY REFERENCE] |
| BR-003 | Batch Cost Allocation | All direct costs (DOC, feed, medicine) and proportional indirect costs (labor, overhead) must be allocated to the Farming Batch to determine Cost Per Kg. | Finance | [CONFIRMED] |
| BR-004 | Yield Variance | Expected yield for dressed broiler is ~65-70%. Yield outside this variance triggers a mandatory audit review. | Processing | [INFERRED] |
| BR-005 | Credit Limit Enforcement | System blocks sales invoice generation if the customer's outstanding balance exceeds their predefined credit limit. | Sales | [PROPOSED] |
| BR-006 | Mortality Threshold | Daily mortality > 0.5% in any shed triggers an immediate SMS/Push alert to the Head Veterinarian and Farm Manager. | Farm Ops | [PROPOSED] |
| BR-007 | Stock Reorder Rule | Feed stock dropping below 3 days' estimated consumption for active batches triggers a low-stock alert. | Inventory | [PROPOSED] |
| BR-008 | Damaged Egg Write-off | Damaged eggs exceeding 2% of daily collection require managerial approval for inventory write-off. | Egg Ops | [PROPOSED] |
