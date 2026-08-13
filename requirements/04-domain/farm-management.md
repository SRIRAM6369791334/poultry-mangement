# Farm Management Requirements

## 1. Overview
This document outlines the requirements for managing the 8 farms and 42 sheds currently operated by the Sri Murugan Poultry & Agro Group.

## 2. Farm Registration and Attributes [CONFIRMED]
The system must allow the registration of farms with the following details:
- **Farm Name & ID**
- **Location / Address**
- **Farm Manager / Supervisor Assigned**
- **Capacity (Total Birds)**
- **Status (Active / Inactive)**

## 3. Shed Management [CONFIRMED]
Farms are subdivided into sheds. The system must support managing up to 42 sheds across the 8 farms.
- **Shed ID / Number**
- **Parent Farm**
- **Capacity (Birds)**
- **Dimensions / Area [PROPOSED]**
- **Current Status (Empty / Occupied / Cleaning)**

## 4. Farm-Level Configuration [INFERRED]
Each farm should have specific configurations:
- Default feed delivery warehouse.
- Configurable environmental targets (temperature/humidity).

## 5. Multi-Farm Visibility & Access Control [CONFIRMED] (CLIENT-036)
Data visibility must be restricted based on user roles:
- **Owner / Top Management:** Can see data and dashboards for ALL 8 farms and 42 sheds.
- **Farm Manager / Supervisor:** Can only view data, dashboards, and reports for the specific farm(s) assigned to them.

## 6. Farm Dashboard Requirements [PROPOSED]
The dashboard for a farm should display:
- Active batches and current bird count.
- Daily mortality rates.
- Feed inventory levels at the farm.
- Alert notifications (e.g., high mortality, low feed).

## 7. Farm Closure / Deactivation [INFERRED]
- The system must allow marking a farm or shed as inactive (e.g., for maintenance).
- A shed cannot be deactivated if it has an active batch.
