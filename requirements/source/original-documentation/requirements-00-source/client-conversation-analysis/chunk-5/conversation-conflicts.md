# Conversation Conflicts - Chunk 5

* **CONFLICT-05-001**: **Below-Cost Sales vs Loss Sales Approval**
  * **Conflict**: The system is initially required to block sales where the margin is negative (Selling below estimated cost). However, immediately after, the client states that there are special cases (like clearing old stock) where they *must* sell at a loss.
  * **Resolution**: The system must not automatically hard-block negative margin sales. Instead, it must issue a warning, require a reason, and enforce an approval workflow before allowing the sale to proceed. [CLIENT-CONFIRMED]
* **CONFLICT-05-002**: **Product Replacement vs New Sale**
  * **Conflict**: When replacing a product for a customer due to a complaint, it might be entered as a new sale, skewing actual sales data.
  * **Resolution**: Replacement orders must be explicitly linked to the original order and not treated as new normal sales. [CLIENT-CONFIRMED]
