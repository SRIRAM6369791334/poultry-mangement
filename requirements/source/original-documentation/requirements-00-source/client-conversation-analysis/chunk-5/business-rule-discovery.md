# Business Rule Discovery - Chunk 5

* **TEMP-BR-05-001**: Expense thresholds dictate approval levels (Manager vs. Owner). [CLIENT-CONFIRMED] (Lines 4097-4101)
* **TEMP-BR-05-002**: Orders with negative margins are blocked by default and require documented reasons and manual approval to proceed. [CLIENT-CONFIRMED] (Lines 4178-4204)
* **TEMP-BR-05-003**: Reserved stock for confirmed orders must have an expiry rule to prevent indefinite holding without payment/confirmation. [CLIENT-CONFIRMED] (Lines 4450-4455)
* **TEMP-BR-05-004**: Product actual cost is not just purchase price; it must include transport, handling, processing, packaging, and wastage. [CLIENT-CONFIRMED] (Lines 4474-4494)
* **TEMP-BR-05-005**: Processing costs must be proportionally allocated to all output products (meat, liver, gizzard, feet, skin) derived from a batch. [CLIENT-CONFIRMED] (Lines 4496-4510)
* **TEMP-BR-05-006**: After processing begins, an order cannot be freely modified; modification rules depend on the current processing stage. [CLIENT-CONFIRMED] (Lines 4649-4654)
* **TEMP-BR-05-007**: Replacement orders for complaints must link to the original order and not be counted as new normal sales. [CLIENT-CONFIRMED] (Lines 4753-4758)
* **TEMP-BR-05-008**: Returned delivery products must not directly return to active stock; they require a QC check and reclassification (Resalable, Rework, Waste, Destroy). [CLIENT-CONFIRMED] (Lines 4888-4903)
* **TEMP-BR-05-009**: New orders must undergo a credit limit check. If the new order exceeds the max outstanding limit, it requires warning/approval. [CLIENT-CONFIRMED] (Lines 4799-4812)
