# Business Rule Discovery - Chunk 2

| Rule ID | Rule Description | Source Lines | Status |
|---|---|---|---|
| TEMP-BR-001 | First-In-First-Out (FIFO) stock rotation must be used for dispatching eggs to ensure freshness. | CLIENT-CONV-L1198-L1202 | [CLIENT-CONFIRMED] |
| TEMP-BR-002 | Own farm eggs and purchased eggs must be tracked separately to calculate profit accurately. | CLIENT-CONV-L1267-L1297 | [CLIENT-CONFIRMED] |
| TEMP-BR-003 | Input Weight must exactly equal Saleable Output + By-products + Waste/Loss. Any mismatch triggers an alert. | CLIENT-CONV-L1869-L1890 | [CLIENT-CONFIRMED] |
| TEMP-BR-004 | High-value wastage adjustments require multi-level approval (Supervisor -> Manager). | CLIENT-CONV-L1820-L1834 | [CLIENT-CONFIRMED] |
| TEMP-BR-005 | Orders cancelled after processing has begun must follow specific business recovery policies (Rework, Alt Sale, Waste). | CLIENT-CONV-L1772-L1791 | [CLIENT-CONFIRMED] |
| TEMP-BR-006 | If actual processed yield is below expected yield %, an alert must be generated. | CLIENT-CONV-L1957-L1971 | [CLIENT-CONFIRMED] |
