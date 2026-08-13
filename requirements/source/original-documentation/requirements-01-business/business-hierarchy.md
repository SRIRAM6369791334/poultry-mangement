# Business Hierarchy & Organizational Structure

## 1. Structural Overview
The following represents the operational hierarchy based on CLIENT-003 [CONFIRMED]:

```text
Sri Murugan Poultry & Agro Group
├── Head Office
├── Warehouse 1 (Feed, Medicine, Equipment, Consumables)
├── Warehouse 2
├── Farm 01 
│   ├── Shed 01
│   ├── Shed 02
│   └── Shed 03
├── Farm 02 ...
├── Farm 08
├── 45 Dealers (each with multiple shops)
├── 120+ Shops/Customers
└── Direct Customers
```

## 2. Entity Descriptions & Data Flow
- **Head Office:** Central node for all management decisions, accounting, and consolidated reporting. Data flows up to HO from all other nodes.
- **Warehouses:** Inventory hubs. Receive POs, execute GRNs, and dispatch to farms based on approved requests. Data flow: Stock levels, dispatch records.
- **Farms (Sheds):** Production units containing active batches. Source of primary daily data (mortality, feed consumption). Data flow: Daily logs up to HO.
- **Dealers & Shops:** Primary B2B sales channels. Data flow: Orders, outstanding balances, payments.
- **Direct Customers:** B2C channels.
