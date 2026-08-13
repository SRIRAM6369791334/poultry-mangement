# Consolidated notification-discovery.md



## From Chunk 1


# Notification Discovery

- **Mortality Alert**: "Farm X mortality is above configured threshold." (CLIENT-CONV-L755) [CLIENT-CONFIRMED]
- **Low Feed Stock**: "Warehouse feed stock is below minimum level." (CLIENT-CONV-L757) [CLIENT-CONFIRMED]
- **Overdue Payment**: "Dealer ABC payment is overdue." (CLIENT-CONV-L759) [CLIENT-CONFIRMED]
- **Vaccine Due**: "Vaccine due tomorrow." (CLIENT-CONV-L761) [CLIENT-CONFIRMED]
- **Medicine Expiry**: "Medicine expires in 30 days." (CLIENT-CONV-L763) [CLIENT-CONFIRMED]
- **Poor FCR**: "Batch X has poor FCR." (CLIENT-CONV-L765) [CLIENT-CONFIRMED]
- **Abnormal Growth**: Alert if weekly average weight shows abnormal growth. (CLIENT-CONV-L334) [CLIENT-CONFIRMED]
- **Credit Limit Exceeded**: Alert when dealer order exceeds credit limit. (CLIENT-CONV-L429) [CLIENT-CONFIRMED]

## From Chunk 2


# Notification Discovery - Chunk 2

* **Rate Change Alert**: Alert management when egg market rates change (e.g., "Large Egg selling rate changed from X to Y"). Shows comparison to purchase/customer rates. [CLIENT-CONFIRMED]
* **Stock Shortage Alert**: Alert generated if a customer order exceeds available warehouse/dealer stock. [CLIENT-CONFIRMED]
* **Yield Variance Alert**: Alert management when the actual processing yield falls below the configured expected yield percentage. [CLIENT-CONFIRMED]
* **Weight Reconciliation Alert**: System warning when input weight does not match the sum of saleable weight + by-products + waste. [CLIENT-CONFIRMED]
* **Underweight Warning**: Warning given to operator when processed final weight is below customer's requested quantity. [CLIENT-CONFIRMED]

## From Chunk 3


# Notification Discovery - Chunk 3

- **Processing Reconciliation Failure** (CLIENT-CONV-L2476): Alert triggered when processing output weights do not match input weight. [CLIENT-CONFIRMED]
- **Vehicle Capacity Exceeded** (CLIENT-CONV-L2636): Alert when today's assigned orders exceed vehicle limit. [CLIENT-CONFIRMED]
- **Credit Limit Warning** (CLIENT-CONV-L2722): Warning when a customer's new order pushes them over their credit limit. [CLIENT-CONFIRMED]
- **Minimum Order Quantity Alert** (CLIENT-CONV-L2804): Prompt shown when user orders less than the MOQ. [CLIENT-CONFIRMED]
- **Storage Expiry Warning** (CLIENT-CONV-L2950): Alert for processed products in cold storage nearing their shelf-life expiry. [CLIENT-CONFIRMED]

## From Chunk 4


# Notification Discovery

| Notification | Trigger | Recipients | Source Lines | Status |
|---|---|---|---|---|
| Abnormal Stock Loss | Physical vs System mismatch > threshold | Management | 3115-3128 | [CLIENT-CONFIRMED] |
| Capacity Shortage | Expected demand > Processing/Warehouse/Fleet capacity | Planning/Management | 3197-3224 | [FUTURE] |
| Exception Alerts | High mortality, Overdue payment, Low margin, etc. | Owner | 3281-3295 | [CLIENT-CONFIRMED] |
| Seasonal Demand Warning | 2-3 months prior to expected seasonal spike | Management | 3363-3378 | [CLIENT-CONFIRMED] |
| Slow Moving Alert | Product last sold date > threshold | Inventory Manager | 3502-3531 | [CLIENT-CONFIRMED] |
| Overstock Alert | Current stock high vs Avg monthly sales | Procurement/Management | 3563-3575 | [CLIENT-CONFIRMED] |
| Stock-Out Prediction | Current stock will deplete based on avg sales | Procurement/Management | 3591-3601 | [CLIENT-CONFIRMED] |
| Predictive Alerts | Early warning for constraints (e.g. Feed depletion) | Farm Manager | 3935-3952 | [CLIENT-CONFIRMED] |

## From Chunk 5


# Notification Discovery - Chunk 5

* **Negative Margin Warning**: System warns if an employee attempts to sell below the estimated product cost. [CLIENT-CONFIRMED]
* **Price Anomaly Alert**: Warning for significantly higher purchase rates or unusually low sales rates. [CLIENT-CONFIRMED]
* **Customer Inactive Alert**: Alerts sales team if a regular customer has not ordered in 30-45 days. [CLIENT-CONFIRMED]
* **Production Loss Trend Alert**: Alert triggered if production loss percentages consistently increase over consecutive days. [CLIENT-CONFIRMED]
* **Abnormal Feed Consumption Alert**: Alert triggered if feed usage is suddenly higher than the batch average. [CLIENT-CONFIRMED]
* **Abnormal Sales Alert**: Flags sudden spikes in product sales for review. [CLIENT-CONFIRMED]
* **Order Status Notification**: SMS/WhatsApp notifications to customers when their order is being processed or dispatched. [FUTURE]
* **Credit Limit Warning**: Warning when a new order will cause a customer to exceed their maximum outstanding credit limit. [CLIENT-CONFIRMED]
* **Fuel Anomaly Warning**: Alerts if a delivery vehicle's fuel consumption is abnormally high compared to standard mileage. [CLIENT-CONFIRMED]
* **Environmental Alert**: Alerts the farm manager if temperature or humidity goes into abnormal ranges. [FUTURE]
