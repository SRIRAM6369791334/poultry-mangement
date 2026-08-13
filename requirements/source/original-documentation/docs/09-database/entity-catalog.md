# Entity Catalog

## 1. Master Data

### 1.1 Organization
- **Purpose**: Root entity for multi-tenant structure.
- **Category**: MASTER
- **Primary Key**: UUID
- **Important Fields**: `name`, `subdomain`, `contact_email`, `status`
- **Required Foreign Keys**: None
- **Unique Constraints**: `subdomain`
- **Index Requirements**: `subdomain`
- **Soft Delete**: Yes
- **History/Versioning**: Yes
- **Audit**: High
- **Notes**: All tenants.

### 1.2 Company
- **Purpose**: Legal entities under an organization.
- **Category**: MASTER
- **Primary Key**: UUID
- **Important Fields**: `name`, `registration_number`, `tax_id`
- **Required Foreign Keys**: `tenant_id` (Organization)
- **Unique Constraints**: `tenant_id`, `registration_number`
- **Index Requirements**: `tenant_id`
- **Soft Delete**: Yes
- **History/Versioning**: Yes
- **Audit**: Medium
- **Notes**: Useful for enterprise clients with multiple companies.

### 1.3 Farm
- **Purpose**: Physical farm locations.
- **Category**: MASTER
- **Primary Key**: UUID
- **Important Fields**: `name`, `address`, `farm_type`
- **Required Foreign Keys**: `tenant_id`, `company_id`
- **Unique Constraints**: `tenant_id`, `name`
- **Index Requirements**: `tenant_id`, `company_id`
- **Soft Delete**: Yes
- **History/Versioning**: No
- **Audit**: Medium
- **Notes**: Can be owned or contract farms.

### 1.4 Shed/House
- **Purpose**: Individual sheds within a farm.
- **Category**: MASTER
- **Primary Key**: UUID
- **Important Fields**: `name`, `capacity`, `dimension_l`, `dimension_w`
- **Required Foreign Keys**: `tenant_id`, `farm_id`
- **Unique Constraints**: `farm_id`, `name`
- **Index Requirements**: `farm_id`
- **Soft Delete**: Yes
- **History/Versioning**: No
- **Audit**: Low
- **Notes**: Tracks active capacity.

### 1.5 Breed
- **Purpose**: Defines poultry breeds.
- **Category**: MASTER
- **Primary Key**: UUID
- **Important Fields**: `name`, `breed_type_id`, `standard_weight`
- **Required Foreign Keys**: `tenant_id`, `breed_type_id`
- **Unique Constraints**: `tenant_id`, `name`
- **Index Requirements**: `tenant_id`
- **Soft Delete**: Yes
- **History/Versioning**: No
- **Audit**: Low
- **Notes**: e.g., Cobb 500, Ross 308.

### 1.6 BreedType
- **Purpose**: Types of breed (Broiler, Layer, Breeder).
- **Category**: CONFIGURATION
- **Primary Key**: UUID
- **Important Fields**: `name`, `description`
- **Required Foreign Keys**: `tenant_id`
- **Unique Constraints**: `tenant_id`, `name`
- **Index Requirements**: `tenant_id`
- **Soft Delete**: Yes
- **History/Versioning**: No
- **Audit**: Low
- **Notes**: Defines operational logic.

### 1.7 FeedType
- **Purpose**: Types of feed (Pre-starter, Starter, Finisher).
- **Category**: MASTER
- **Primary Key**: UUID
- **Important Fields**: `name`, `nutritional_info`
- **Required Foreign Keys**: `tenant_id`
- **Unique Constraints**: `tenant_id`, `name`
- **Index Requirements**: `tenant_id`
- **Soft Delete**: Yes
- **History/Versioning**: No
- **Audit**: Low
- **Notes**: Links to feed formulas.

### 1.8 FeedFormula
- **Purpose**: Formula for mixing feed.
- **Category**: MASTER
- **Primary Key**: UUID
- **Important Fields**: `name`, `version`, `is_active`
- **Required Foreign Keys**: `tenant_id`, `feed_type_id`
- **Unique Constraints**: `tenant_id`, `name`, `version`
- **Index Requirements**: `tenant_id`, `feed_type_id`
- **Soft Delete**: Yes
- **History/Versioning**: Yes
- **Audit**: High
- **Notes**: Used in feed mills.

### 1.9 MedicineType
- **Purpose**: Catalog of medicines.
- **Category**: MASTER
- **Primary Key**: UUID
- **Important Fields**: `name`, `active_ingredient`, `withdrawal_period_days`
- **Required Foreign Keys**: `tenant_id`
- **Unique Constraints**: `tenant_id`, `name`
- **Index Requirements**: `tenant_id`
- **Soft Delete**: Yes
- **History/Versioning**: No
- **Audit**: Low
- **Notes**: Used for treatment tracking.

### 1.10 VaccineType
- **Purpose**: Catalog of vaccines.
- **Category**: MASTER
- **Primary Key**: UUID
- **Important Fields**: `name`, `administration_method`, `schedule_days`
- **Required Foreign Keys**: `tenant_id`
- **Unique Constraints**: `tenant_id`, `name`
- **Index Requirements**: `tenant_id`
- **Soft Delete**: Yes
- **History/Versioning**: No
- **Audit**: Low
- **Notes**: Used in vaccination schedules.

### 1.11 DiseaseType
- **Purpose**: Trackable diseases.
- **Category**: MASTER
- **Primary Key**: UUID
- **Important Fields**: `name`, `symptoms`, `severity`
- **Required Foreign Keys**: `tenant_id`
- **Unique Constraints**: `tenant_id`, `name`
- **Index Requirements**: `tenant_id`
- **Soft Delete**: Yes
- **History/Versioning**: No
- **Audit**: Low
- **Notes**: Linked to mortality records.

### 1.12 EggGrade
- **Purpose**: Grades for eggs (A, B, Jumbo, etc.).
- **Category**: MASTER
- **Primary Key**: UUID
- **Important Fields**: `name`, `min_weight`, `max_weight`
- **Required Foreign Keys**: `tenant_id`
- **Unique Constraints**: `tenant_id`, `name`
- **Index Requirements**: `tenant_id`
- **Soft Delete**: Yes
- **History/Versioning**: No
- **Audit**: Low
- **Notes**: Used in egg collection and grading.

### 1.13 Equipment
- **Purpose**: Farm equipment inventory.
- **Category**: MASTER
- **Primary Key**: UUID
- **Important Fields**: `name`, `equipment_type`, `purchase_date`, `status`
- **Required Foreign Keys**: `tenant_id`, `farm_id`
- **Unique Constraints**: None
- **Index Requirements**: `tenant_id`, `farm_id`
- **Soft Delete**: Yes
- **History/Versioning**: No
- **Audit**: Medium
- **Notes**: Maintenance tracking possible.

### 1.14 Warehouse
- **Purpose**: Storage locations for inventory.
- **Category**: MASTER
- **Primary Key**: UUID
- **Important Fields**: `name`, `location`, `capacity`
- **Required Foreign Keys**: `tenant_id`, `farm_id` (optional)
- **Unique Constraints**: `tenant_id`, `name`
- **Index Requirements**: `tenant_id`
- **Soft Delete**: Yes
- **History/Versioning**: No
- **Audit**: Low
- **Notes**: Tracks stock items.

### 1.15 UnitOfMeasure
- **Purpose**: UOMs (kg, lbs, units, etc.).
- **Category**: CONFIGURATION
- **Primary Key**: String or UUID
- **Important Fields**: `code`, `name`, `conversion_factor`
- **Required Foreign Keys**: `tenant_id`
- **Unique Constraints**: `tenant_id`, `code`
- **Index Requirements**: `tenant_id`
- **Soft Delete**: Yes
- **History/Versioning**: No
- **Audit**: Low
- **Notes**: Centralized UOM.

### 1.16 Currency
- **Purpose**: Currencies used.
- **Category**: CONFIGURATION
- **Primary Key**: String (ISO Code)
- **Important Fields**: `code`, `name`, `symbol`
- **Required Foreign Keys**: None
- **Unique Constraints**: `code`
- **Index Requirements**: None
- **Soft Delete**: No
- **History/Versioning**: No
- **Audit**: Low
- **Notes**: Global system config.

### 1.17 TaxRate
- **Purpose**: Tax configurations.
- **Category**: CONFIGURATION
- **Primary Key**: UUID
- **Important Fields**: `name`, `rate_percentage`, `is_active`
- **Required Foreign Keys**: `tenant_id`
- **Unique Constraints**: `tenant_id`, `name`
- **Index Requirements**: `tenant_id`
- **Soft Delete**: Yes
- **History/Versioning**: Yes
- **Audit**: Medium
- **Notes**: Used in billing.

### 1.18 PaymentTerm
- **Purpose**: Net 30, Due on Receipt, etc.
- **Category**: CONFIGURATION
- **Primary Key**: UUID
- **Important Fields**: `name`, `days`
- **Required Foreign Keys**: `tenant_id`
- **Unique Constraints**: `tenant_id`, `name`
- **Index Requirements**: `tenant_id`
- **Soft Delete**: Yes
- **History/Versioning**: No
- **Audit**: Low
- **Notes**: Used in invoices.

### 1.19 CustomerCategory
- **Purpose**: Retail, Wholesale, etc.
- **Category**: MASTER
- **Primary Key**: UUID
- **Important Fields**: `name`, `discount_rate`
- **Required Foreign Keys**: `tenant_id`
- **Unique Constraints**: `tenant_id`, `name`
- **Index Requirements**: `tenant_id`
- **Soft Delete**: Yes
- **History/Versioning**: No
- **Audit**: Low
- **Notes**: Pricing strategies.

### 1.20 SupplierCategory
- **Purpose**: Feed suppliers, Equipment, etc.
- **Category**: MASTER
- **Primary Key**: UUID
- **Important Fields**: `name`
- **Required Foreign Keys**: `tenant_id`
- **Unique Constraints**: `tenant_id`, `name`
- **Index Requirements**: `tenant_id`
- **Soft Delete**: Yes
- **History/Versioning**: No
- **Audit**: Low
- **Notes**: Organizing suppliers.

### 1.21 ExpenseCategory
- **Purpose**: Labor, Feed, Medical.
- **Category**: MASTER
- **Primary Key**: UUID
- **Important Fields**: `name`, `parent_id`
- **Required Foreign Keys**: `tenant_id`
- **Unique Constraints**: `tenant_id`, `name`
- **Index Requirements**: `tenant_id`
- **Soft Delete**: Yes
- **History/Versioning**: No
- **Audit**: Low
- **Notes**: Hierarchical categorization.

### 1.22 Department
- **Purpose**: HR departments.
- **Category**: MASTER
- **Primary Key**: UUID
- **Important Fields**: `name`
- **Required Foreign Keys**: `tenant_id`
- **Unique Constraints**: `tenant_id`, `name`
- **Index Requirements**: `tenant_id`
- **Soft Delete**: Yes
- **History/Versioning**: No
- **Audit**: Low
- **Notes**: Payroll and HR.

### 1.23 Designation
- **Purpose**: Job titles.
- **Category**: MASTER
- **Primary Key**: UUID
- **Important Fields**: `name`, `level`
- **Required Foreign Keys**: `tenant_id`
- **Unique Constraints**: `tenant_id`, `name`
- **Index Requirements**: `tenant_id`
- **Soft Delete**: Yes
- **History/Versioning**: No
- **Audit**: Low
- **Notes**: HR.


## 2. Transaction Data

### 2.1 Batch/Flock
- **Purpose**: Core entity for tracking a group of birds.
- **Category**: TRANSACTION
- **Primary Key**: UUID
- **Important Fields**: `batch_number`, `start_date`, `end_date`, `status`, `initial_quantity`
- **Required Foreign Keys**: `tenant_id`, `farm_id`, `shed_id`, `breed_id`
- **Unique Constraints**: `tenant_id`, `batch_number`
- **Index Requirements**: `tenant_id`, `farm_id`, `shed_id`, `status`
- **Soft Delete**: Yes
- **History/Versioning**: Yes
- **Audit**: High
- **Notes**: Lifecyle tracking.

### 2.2 BirdPlacement
- **Purpose**: Initial placement of DOCs in shed.
- **Category**: TRANSACTION
- **Primary Key**: UUID
- **Important Fields**: `placement_date`, `quantity`, `supplier_id`, `cost`
- **Required Foreign Keys**: `tenant_id`, `batch_id`
- **Unique Constraints**: None
- **Index Requirements**: `batch_id`
- **Soft Delete**: No
- **History/Versioning**: No
- **Audit**: Medium
- **Notes**: Triggers batch activation.

### 2.3 DailyMortality
- **Purpose**: Daily death records.
- **Category**: TRANSACTION
- **Primary Key**: UUID
- **Important Fields**: `record_date`, `quantity`, `reason`
- **Required Foreign Keys**: `tenant_id`, `batch_id`, `disease_type_id` (optional)
- **Unique Constraints**: `batch_id`, `record_date`
- **Index Requirements**: `batch_id`, `record_date`
- **Soft Delete**: No
- **History/Versioning**: No
- **Audit**: Medium
- **Notes**: Decrements batch live count.

### 2.4 DailyFeedConsumption
- **Purpose**: Feed consumed daily.
- **Category**: TRANSACTION
- **Primary Key**: UUID
- **Important Fields**: `record_date`, `quantity_kg`
- **Required Foreign Keys**: `tenant_id`, `batch_id`, `feed_type_id`
- **Unique Constraints**: `batch_id`, `record_date`, `feed_type_id`
- **Index Requirements**: `batch_id`, `record_date`
- **Soft Delete**: No
- **History/Versioning**: No
- **Audit**: Medium
- **Notes**: Impacts feed inventory.

### 2.5 WeightRecord
- **Purpose**: Sample weighing.
- **Category**: TRANSACTION
- **Primary Key**: UUID
- **Important Fields**: `record_date`, `average_weight`, `sample_size`
- **Required Foreign Keys**: `tenant_id`, `batch_id`
- **Unique Constraints**: `batch_id`, `record_date`
- **Index Requirements**: `batch_id`, `record_date`
- **Soft Delete**: No
- **History/Versioning**: No
- **Audit**: Low
- **Notes**: Used for FCR calculations.

### 2.6 VaccinationRecord
- **Purpose**: Administered vaccines.
- **Category**: TRANSACTION
- **Primary Key**: UUID
- **Important Fields**: `administration_date`, `dose_quantity`, `administrator`
- **Required Foreign Keys**: `tenant_id`, `batch_id`, `vaccine_type_id`
- **Unique Constraints**: None
- **Index Requirements**: `batch_id`
- **Soft Delete**: No
- **History/Versioning**: No
- **Audit**: Medium
- **Notes**: Checks against schedule.

### 2.7 MedicationRecord
- **Purpose**: Administered medicines.
- **Category**: TRANSACTION
- **Primary Key**: UUID
- **Important Fields**: `start_date`, `end_date`, `dosage`
- **Required Foreign Keys**: `tenant_id`, `batch_id`, `medicine_type_id`
- **Unique Constraints**: None
- **Index Requirements**: `batch_id`
- **Soft Delete**: No
- **History/Versioning**: No
- **Audit**: Medium
- **Notes**: Important for withdrawal periods.

### 2.8 EggCollection
- **Purpose**: Daily eggs gathered.
- **Category**: TRANSACTION
- **Primary Key**: UUID
- **Important Fields**: `collection_date`, `total_quantity`, `broken_quantity`
- **Required Foreign Keys**: `tenant_id`, `batch_id`
- **Unique Constraints**: `batch_id`, `collection_date`
- **Index Requirements**: `batch_id`
- **Soft Delete**: No
- **History/Versioning**: No
- **Audit**: Medium
- **Notes**: Layer/Breeder farms.

### 2.9 EggGradingRecord
- **Purpose**: Sorting collected eggs.
- **Category**: TRANSACTION
- **Primary Key**: UUID
- **Important Fields**: `grading_date`, `quantity`
- **Required Foreign Keys**: `tenant_id`, `egg_collection_id`, `egg_grade_id`
- **Unique Constraints**: `egg_collection_id`, `egg_grade_id`
- **Index Requirements**: `egg_collection_id`
- **Soft Delete**: No
- **History/Versioning**: No
- **Audit**: Low
- **Notes**: Links to inventory.

### 2.10 IncubationBatch
- **Purpose**: Hatchery setting batch.
- **Category**: TRANSACTION
- **Primary Key**: UUID
- **Important Fields**: `setting_date`, `expected_hatch_date`, `eggs_set_quantity`
- **Required Foreign Keys**: `tenant_id`, `machine_id` (Equipment)
- **Unique Constraints**: None
- **Index Requirements**: `tenant_id`, `setting_date`
- **Soft Delete**: Yes
- **History/Versioning**: Yes
- **Audit**: High
- **Notes**: Tracks hatchery process.

### 2.11 CandlingRecord
- **Purpose**: Fertility check.
- **Category**: TRANSACTION
- **Primary Key**: UUID
- **Important Fields**: `candling_date`, `infertile_quantity`, `dead_embryo_quantity`
- **Required Foreign Keys**: `tenant_id`, `incubation_batch_id`
- **Unique Constraints**: `incubation_batch_id`, `candling_date`
- **Index Requirements**: `incubation_batch_id`
- **Soft Delete**: No
- **History/Versioning**: No
- **Audit**: Medium
- **Notes**: Updates viable egg count.

### 2.12 HatchRecord
- **Purpose**: Hatching results.
- **Category**: TRANSACTION
- **Primary Key**: UUID
- **Important Fields**: `hatch_date`, `good_chicks`, `cull_chicks`, `unhatched`
- **Required Foreign Keys**: `tenant_id`, `incubation_batch_id`
- **Unique Constraints**: `incubation_batch_id`
- **Index Requirements**: `incubation_batch_id`
- **Soft Delete**: No
- **History/Versioning**: No
- **Audit**: High
- **Notes**: Completes hatchery batch.

### 2.13 ChickDispatch
- **Purpose**: Selling or moving hatched chicks.
- **Category**: TRANSACTION
- **Primary Key**: UUID
- **Important Fields**: `dispatch_date`, `quantity`, `destination`
- **Required Foreign Keys**: `tenant_id`, `hatch_record_id`, `customer_id` (optional)
- **Unique Constraints**: None
- **Index Requirements**: `hatch_record_id`
- **Soft Delete**: No
- **History/Versioning**: No
- **Audit**: High
- **Notes**: Decrements hatchery inventory.

### 2.14 PurchaseRequisition, PurchaseOrder, PurchaseOrderLine, GoodsReceipt, GoodsReceiptLine, SalesOrder, SalesOrderLine, SalesInvoice, SalesInvoiceLine, Dispatch, Payment, Receipt, Expense, JournalEntry, JournalEntryLine, StockMovement, StockAdjustment, FeedProduction, FeedProductionIngredient
*(Additional transaction records follow standard ERP models, incorporating `tenant_id` and standard audit fields)*

## 3. History/Audit Data
- AuditLog
- BatchHistory
- StockHistory
- PriceHistory
- FinancialPeriod

## 4. Configuration Data
- TenantConfig
- SubscriptionPlan
- FeatureFlag
- NotificationTemplate
- ReportTemplate
- AlertRule

## 5. User & Auth
- User
- Role
- Permission
- RolePermission
- UserRole
- UserSession
- LoginHistory
