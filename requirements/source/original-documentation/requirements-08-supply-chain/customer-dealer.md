# Supply Chain: Customer & Dealer Management

## 1. Overview
Manages relationships, credit limits, and financial standing for the 45+ dealers and 120+ direct customers/shops. Customers and Dealers are treated as distinct entities with specific business rules.

## 2. Dealer Management [CONFIRMED] (CLIENT-016)
*   **Entity Structure:** One dealer can operate or supply multiple shops/locations.
*   **Profile Data:** Contact details, Address, assigned Sales Rep.
*   **Commercial Terms:** Credit limit, customized payment terms, dealer-specific rate charts.
*   **Tracking:** Outstanding balance, Payment history, Sales volume history, Return frequency.

## 3. Customer Management [CONFIRMED] (CLIENT-017)
*   **Profile Data:** Direct B2B (Hotels, Retailers) and B2C customers.
*   **Tracking:** Order frequency, Sales volume, Payment history, Outstanding dues, Return history.
*   **Pricing:** Customer-specific rate negotiation and tracking [INFERRED].

## 4. Credit Limit Controls [CONFIRMED] (CLIENT-137)
The system must enforce credit limits dynamically during order entry.
*   **Scenario:**
    *   Credit Limit = ₹1,00,000.
    *   Current Outstanding = ₹95,000.
    *   New Order Value = ₹15,000.
    *   *System Action:* Flags that the limit is exceeded (Total would be ₹1,10,000).
*   **Policy Options:** The system must support configurable responses:
    1.  **Hard Block:** Cannot save the order.
    2.  **Soft Block:** Allow saving with a warning, but suspend processing.
    3.  **Override:** Allow processing only with explicit Manager Approval.

## 5. Profitability & Analytics [PROPOSED]
*   **Dealer/Customer Profitability:** Report on net margin per customer after discounts, transport costs, and return losses.
*   **Aging Analysis:** 30/60/90 day outstanding reports for credit control.
