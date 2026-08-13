# Data Validation Rules
This document details exhaustive validation rules applied at the UI and API levels to ensure data integrity.

## Bird Inventory Validations
1. **VR-001**: `mortality` >= 0
2. **VR-002**: `mortality` <= `opening_live_birds`
3. **VR-003**: `culls` >= 0
4. **VR-004**: `culls` + `mortality` <= `opening_live_birds`
5. **VR-005**: `placement_count` > 0
6. **VR-006**: `placement_date` <= `current_date` (Cannot place flocks in the future)
7. **VR-007**: `closing_birds` = `opening_live_birds` - `mortality` - `culls` - `sales` (Strict equation check)
8. **VR-008**: Missing days must be filled before entering current day (No gaps in daily data)

## Feed & Water Validations
9. **VR-009**: `feed_consumed_kg` >= 0
10. **VR-010**: `feed_consumed_kg` <= `current_silo_inventory_kg` (Cannot consume more than available)
11. **VR-011**: `water_consumed_liters` >= 0
12. **VR-012**: `feed_delivery_amount` > 0
13. **VR-013**: `feed_type` must map to valid phase for flock age (Warning if violated)
14. **VR-014**: Feed conversion ratio daily cap check (Reject if daily FCR > 5.0, likely typo)

## Weight Validations
15. **VR-015**: `sample_weight_kg` > 0
16. **VR-016**: `sample_bird_count` > 0
17. **VR-017**: `avg_bird_weight_kg` must logically increase or stay stable (Warning if drops > 5%)
18. **VR-018**: Max realistic broiler weight cap: `avg_bird_weight_kg` <= 5.0 kg
19. **VR-019**: Min realistic chick weight: `avg_chick_weight_g` >= 30g

## Egg Production (Layer/Breeder) Validations
20. **VR-020**: `total_eggs_collected` >= 0
21. **VR-021**: `total_eggs_collected` <= (`live_hen_count` * 1) per day (Hens lay max 1 egg/day. Rare exceptions trigger warnings, hard limit at 1.1x)
22. **VR-022**: `defective_eggs` (cracked, soft, double yolk) <= `total_eggs_collected`
23. **VR-023**: `saleable_eggs` + `defective_eggs` = `total_eggs_collected`
24. **VR-024**: `avg_egg_weight_g` between 40g and 80g
25. **VR-025**: `hatching_eggs_set` <= `hatching_eggs_inventory`

## Environment Validations
26. **VR-026**: `min_temperature` <= `max_temperature`
27. **VR-027**: `humidity_percent` between 0 and 100
28. **VR-028**: `ammonia_ppm` >= 0 (Warning if > 25 ppm)
29. **VR-029**: `light_hours` between 0 and 24

## Financial Validations
30. **VR-030**: `invoice_total` = `sum(line_items)` + `tax` - `discount`
31. **VR-031**: `discount_percent` between 0 and 100
32. **VR-032**: `unit_price` >= 0
33. **VR-033**: `payment_amount` > 0
34. **VR-034**: `payment_amount` <= `invoice_outstanding_balance`
35. **VR-035**: Account strings must map to active GL codes
36. **VR-036**: Contract base rates must be > 0

## Hatchery Validations
37. **VR-037**: `eggs_set` > 0
38. **VR-038**: `chicks_hatched` <= `eggs_set`
39. **VR-039**: `fertile_eggs` <= `eggs_set`
40. **VR-040**: `cull_chicks` + `saleable_chicks` = `chicks_hatched`
41. **VR-041**: Incubation period check (Broiler hatch must be ~21 days from set date)

## Entity/State Validations
42. **VR-042**: Cannot edit `daily_records` if `batch_status` is "Closed"
43. **VR-043**: Cannot change `farm_status` to "Inactive" if active batches exist
44. **VR-044**: `start_date` <= `end_date` (for any period queries)
45. **VR-045**: Cannot sell stock from an unapproved vendor/supplier
46. **VR-046**: Medicine batch expiration date must be >= current date at time of use
47. **VR-047**: Cannot transfer birds to a shed that is in "Cleaning" or "Maintenance" state
48. **VR-048**: Transferred bird count <= source shed bird count
49. **VR-049**: Target shed must belong to the same Farm (unless Inter-Farm Transfer module used)
50. **VR-050**: User roles must match action (e.g., Only 'Vet' can sign off post-mortem reports)
