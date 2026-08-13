# Entity Discovery

- **Company / Head Office**: The main organization umbrella.
- **Warehouse**: Stores feed, medicine, vaccines, equipment, consumables. Attributes: stock levels.
- **Farm**: Groups of sheds. Attributes: Farm Manager, location.
- **Shed / Flock**: Physical location of a batch within a farm.
- **Batch**: A specific group of birds. Attributes: Bird count, breed, supplier, rate, purchase cost, arrival date, farm, shed, batch number.
- **Supplier**: Feed, chick, medicine, equipment suppliers. Attributes: purchase history, rate history, payment history, outstanding, quality history, delivery performance.
- **Dealer**: Buys birds/products. Attributes: Contact, Address, Shop(s), Credit limit, Payment terms, Rate, Outstanding, Payment history, Sales history, Returns.
- **Customer (Direct)**: Buys directly. Attributes: Profile, orders, sales, payment, outstanding, purchase history, returns.
- **Employee**: Office, Farm, Warehouse, Driver, Sales, Accounts, Management. Attributes: profile, department, designation, farm assignment, joining date, salary, attendance, leave, advance, deduction, overtime, payroll.
- **Vehicle**: Lorry, Mini truck, Pickup, Bike. Attributes: Vehicle details, Driver, Trip, Farm/Dealer route, distance, diesel, maintenance, insurance, service, expenses.
- **Item/Product**: Feed, Medicine, Vaccine, Equipment, Consumables, Packaging, Egg.
- **Health Record**: Disease, symptoms, diagnosis, medicine, dosage, treatment period, vet, vaccination, vaccine batch, date, due date, withdrawal period.
- **Harvest/Sales Invoice**: Gross weight, tare weight, net weight, bird count, rate, amount, transport, buyer, vehicle, driver.
