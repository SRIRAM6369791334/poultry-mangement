# Farm Management Module

## 1. Overview
The Farm Management module is the core structural component of the ERP. It defines the physical and logical layout of the agricultural assets, specifically farms and their constituent sheds/houses. It acts as the spatial master data upon which all biological (flocks) and operational transactions occur.

## 2. Farm Registration
- **Purpose**: To register a distinct physical farm location into the system.
- **Data Entities**:
  - `Farm Name`: Unique identifier.
  - `Farm Code`: Short alphanumeric code (e.g., BR-01).
  - `Location/Address`: Physical address.
  - `GPS Coordinates`: Latitude/Longitude (useful for logistics and bio-security zoning).
  - `Farm Type`: Broiler, Breeder, Layer, Rearing.
  - `Total Capacity`: Aggregate bird capacity across all sheds.
  - `Ownership Status`: Owned, Leased, Contract (Integration).
  - `Manager/In-charge`: Link to user profile.
- **Business Rules**: Farm code must be unique per tenant.
- **Roles**: Admin, Operations Manager.

## 3. Shed / House Management
- **Purpose**: To define the individual rearing units within a farm. A flock/batch exists within a specific shed.
- **Data Entities**:
  - `Shed Name/Number`: Unique within the farm (e.g., Shed A, Shed 01).
  - `Dimensions`: Length, Width (calculates Area in sq ft or sq meters).
  - `Maximum Capacity`: Number of birds (calculated via Area * standard density, but overridable).
  - `Housing Type`: Open-sided, Environmentally Controlled (EC), Deep Litter, Cages.
  - `Equipment Details`: Number of feeder lines, drinker lines, fans, heaters.
  - `Status`: Active, Maintenance, Empty, Occupied.
- **Business Rules**: 
  - System prevents placement of a new batch into an 'Occupied' or 'Maintenance' shed.
  - Validates placement density against Shed Area to warn if over-stocked.
- **Roles**: Farm Manager, Operations Manager.

## 4. Farm Configuration
- **Purpose**: Define operational parameters specific to the farm.
- **Features & Settings**:
  - `Biosecurity Rules`: Rest-period (downtime) requirement between batches (e.g., minimum 14 days empty).
  - `Default Feed/Water Standards`: Link to specific standard curves based on the farm's climate zone.
  - `Integration Links`: Default vendor/feed mill linked to this farm.

## 5. Farm Dashboard
- **Purpose**: Real-time overview of farm status.
- **Features**:
  - Map view (if multiple farms).
  - Shed status matrix (Green=Occupied/Healthy, Yellow=Empty, Red=High Mortality Alert).
  - Current total inventory (Birds, Feed bags).
  - Active tasks for the day (e.g., "Vaccination scheduled for Shed 3").
- **Roles**: Farm Manager, Supervisors.

## 6. Farm Closure/Deactivation
- **Purpose**: Retire a farm or shed that is no longer operational.
- **Steps**:
  - Ensure all sheds have 0 bird inventory.
  - Transfer or write-off remaining feed/medicine inventory.
  - Settle all pending financial ledgers linked to the farm cost center.
  - Mark status as `Deactivated`. (Soft delete to preserve historical data).
- **Roles**: Admin.
