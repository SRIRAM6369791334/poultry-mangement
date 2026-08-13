# Entity Discovery - Chunk 3

- **Order**: Contains Custom Requirements, Selling Type, Requested Weight, Accepted Weight, Rejected Weight. [CLIENT-CONFIRMED] (CLIENT-CONV-L2005, L2280)
- **Product Variant**: Sub-types of main products (e.g., Live, Whole Cleaned, Curry Cut, Skinless). [CLIENT-CONFIRMED] (CLIENT-CONV-L2336-L2345)
- **Processing Batch**: Entity tracking 1 bird yielding multiple parts (Meat, Breast, Liver, Skin, Waste). [CLIENT-CONFIRMED] (CLIENT-CONV-L2365-L2375)
- **Recurring Order Template**: Template storing daily requested quantities for regular customers. [CLIENT-CONFIRMED] (CLIENT-CONV-L2586-L2593)
- **Delivery Slot**: Time allocations (Morning, Afternoon, Custom) associated with routes. [CLIENT-CONFIRMED] (CLIENT-CONV-L2617-L2620)
- **Route**: Group of customers mapped to a warehouse dispatch. [CLIENT-CONFIRMED] (CLIENT-CONV-L2652-L2658)
- **Rate Contract**: Entity linking Customer, Product, Selling Mode, Rate, Effective Dates, and Limits. [CLIENT-CONFIRMED] (CLIENT-CONV-L2740-L2748)
- **Cold Storage Entry**: Tracking storage location, batch, product, weight, entry/exit times, and temperature. [CLIENT-CONFIRMED] (CLIENT-CONV-L2936-L2943)
