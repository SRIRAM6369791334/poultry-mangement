# Conversation Conflicts - Chunk 2

| Conflict ID | Description | Resolution / Status |
|---|---|---|
| CONFLICT-001 | Order Cancellation Impact: Customer can cancel before processing (simple), but canceling *after* processing starts presents a problem since the bird is already cut. | Requires clear business rule definition. Client mentioned "business rule needed" for post-processing cancellation. [TO-BE-CONFIRMED] |
| CONFLICT-002 | Direct Farm to Dealer Delivery vs Standard Warehouse flow: Bypassing the central warehouse means the standard flow (Farm -> Warehouse -> Dealer) isn't strictly enforced. | System routing must be flexible; direct transfer paths must be allowed. [CLIENT-CONFIRMED] |
