# 9.2 Vehicle Management

## 9.2.1 Overview
This module tracks the operations, maintenance, and expenses associated with the fleet of 18 vehicles used for transport and logistics.

## 9.2.2 Vehicle Master (CLIENT-025)
| Req ID | Feature | Description | Source |
|---|---|---|---|
| VEH-01 | Vehicle Profile | Track Vehicle Number, Make, Model, Type (Lorry, Mini truck, Pickup, Bike, Other), and Capacity. | [CONFIRMED] |
| VEH-02 | Ownership Status | Differentiate between Company Owned and Leased/Hired vehicles. | [TO BE CONFIRMED] |
| VEH-03 | Driver Assignment | Assign specific drivers to vehicles, maintaining a history of assignments. | [CONFIRMED] |
| VEH-04 | Compliance Tracking | Track Insurance renewal dates, FC (Fitness Certificate), and Tax validity with alerts for upcoming renewals. | [PROPOSED] |

## 9.2.3 Trip Management (CLIENT-025)
| Req ID | Feature | Description | Source |
|---|---|---|---|
| TRP-01 | Trip Logging | Record trip details: Vehicle, Driver, Origin (e.g., Farm), Destination (e.g., Dealer/Warehouse), Date, Time. | [CONFIRMED] |
| TRP-02 | Distance Tracking | Record starting and ending odometer readings to calculate exact distance covered. | [CONFIRMED] |
| TRP-03 | Trip Purpose | Categorize trips (e.g., Feed Delivery, Live Bird Transport, Processed Chicken Delivery). | [PROPOSED] |

## 9.2.4 Fuel & Expense Tracking (CLIENT-025)
| Req ID | Feature | Description | Source |
|---|---|---|---|
| FLX-01 | Diesel/Fuel Logging | Track fuel purchases: Date, Quantity (Liters), Rate, Total Amount, and Odometer reading at the time of fueling. | [CONFIRMED] |
| FLX-02 | Mileage Calculation | Automatically calculate fuel efficiency (km/l) per vehicle to monitor performance. | [PROPOSED] |
| FLX-03 | Trip-wise Expenses | Record expenses incurred during a trip (Tolls, Driver Bata/Food allowance, Minor repairs). | [CONFIRMED] |
| FLX-04 | Cost Allocation | Allocate trip costs to specific batches, farms, or delivery routes for accurate profitability analysis. | [INFERRED] |

## 9.2.5 Maintenance & Service (CLIENT-025)
| Req ID | Feature | Description | Source |
|---|---|---|---|
| MNT-01 | Service Logs | Record scheduled and unscheduled maintenance, including parts replaced and service costs. | [CONFIRMED] |
| MNT-02 | Maintenance Reminders | System alerts for due services based on kilometers driven or time intervals. | [PROPOSED] |
| MNT-03 | Total Cost of Ownership | Consolidate fuel, maintenance, insurance, and driver costs to calculate the operational cost per kilometer for each vehicle. | [PROPOSED] |
