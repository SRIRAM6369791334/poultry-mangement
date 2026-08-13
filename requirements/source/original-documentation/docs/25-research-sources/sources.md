# Research Sources & References

This document catalogues the domain research sources used to define the formulas, standards, and workflows within the Poultry Management ERP platform.

## 1. Industry Organizations & Primary Breeders

These sources provide the baseline genetic potential, standard growth curves, and feeding guidelines.

| Source Name | URL / Reference | What was Referenced | Relevance |
| :--- | :--- | :--- | :--- |
| **Cobb-Vantress** | [cobb-vantress.com](https://cobb-vantress.com/resources/) | Broiler Performance & Nutrition Supplements | Used for baseline Broiler FCR, ADG, and target mortality formulas. |
| **Aviagen (Ross/Arbor Acres)** | [aviagen.com](https://aviagen.com/en/tech-center/) | Ross 308 Broiler Management Handbook | Environmental thresholds, lighting programs, and weight-to-feed ratios. |
| **Hy-Line International** | [hyline.com](https://www.hyline.com/resources) | Layer Management Guides (W-36, Brown) | Hen-Day Egg Production (HDEP) formulas, egg mass calculations, layer lifecycle (rearing vs lay). |
| **Lohmann Breeders** | [lohmann-breeders.com](https://lohmann-breeders.com/management-guides/) | Lohmann LSL-Classic Guide | Egg grading standards, feed conversion per dozen eggs, and lighting logic for layers. |
| **Hubbard** | [hubbardbreeders.com](https://www.hubbardbreeders.com/) | Breeder Management Manual | Incubation parameters, male-to-female ratio standards for breeder flocks. |

## 2. Government & Regulatory Bodies

Sources defining compliance, veterinary reporting, and agricultural data standards.

| Source Name | URL / Reference | What was Referenced | Relevance |
| :--- | :--- | :--- | :--- |
| **USDA (United States Dept of Agriculture)** | [usda.gov](https://www.usda.gov/topics/animals/poultry) | APHIS Poultry Biosecurity | Workflow guards for farm visitation, quarantine states, and disease outbreak logging requirements. |
| **FAO (Food and Agriculture Organization)** | [fao.org](https://www.fao.org/poultry-meat-and-eggs/en/) | Good Agricultural Practices (GAP) | Multi-language terminology, international standard metric definitions for poultry yield. |
| **ICAR (Indian Council of Agricultural Research)** | [icar.org.in](https://icar.org.in/) | DPR (Directorate of Poultry Research) | Localized data for tropical climate poultry management, native breed lifecycles. |
| **DAHD India** | [dahd.nic.in](https://dahd.nic.in/) | Dept of Animal Husbandry | Contract farming legal templates, subsidies tracking structures. |

## 3. Veterinary & Scientific References

Sources for medication, pathology, and welfare rules.

| Source Name | URL / Reference | What was Referenced | Relevance |
| :--- | :--- | :--- | :--- |
| **Merck Veterinary Manual** | [merckvetmanual.com](https://www.merckvetmanual.com/poultry) | Poultry Pathology & Pharmacology | Medicine withdrawal periods (critical for pre-harvest workflows), vaccination scheduling. |
| **OIE/WOAH (World Organisation for Animal Health)** | [woah.org](https://www.woah.org/en/home/) | Animal Welfare Standards | Space density calculations (birds per sq. meter/ft), humane culling tracking. |
| **NRC (National Research Council)** | Nutrient Requirements of Poultry (9th Rev. Ed.) | Feed formulation constraints | Defined data structures for Feed Mill modules (Crude Protein, ME, Calcium ratios). |

## 4. Competitor & Market Research

Analysis of existing software to ensure feature parity and identify UI/UX improvements.

| Source Name | URL / Reference | What was Referenced | Relevance |
| :--- | :--- | :--- | :--- |
| **PoultryOS** | Market Research | Multi-module integration | Validated the need for a unified API between Breeder, Hatchery, and Broiler modules. |
| **Farmapp / Agrimesh** | Market Research | IoT integrations | Inspired ADR-007 (Auth) for secure climate sensor data ingestion. |
| **Navfarm / ERPNext Ag** | Market Research | Accounting integration | Baseline for Purchase Order and Invoice state machines; mapping bio-assets to charts of accounts. |

## 5. Academic Papers & Books

| Source Name | URL / Reference | What was Referenced | Relevance |
| :--- | :--- | :--- | :--- |
| **Commercial Poultry Nutrition** | Leeson & Summers (Book) | Feed phase transitions | Logic for transitioning batches from Starter to Grower to Finisher feeds based on age/weight. |
| **Poultry Science Journal** | [academic.oup.com/ps](https://academic.oup.com/ps) | Hatchability algorithms | Incubation state machine limits (e.g., day 18 transfer, moisture loss calculations). |

---
**Note:** All calculated metrics in the application (like European Production Efficiency Factor - EPEF, or Hen-Housed Egg Production - HHEP) are strictly derived from the Aviagen and Hy-Line management handbooks listed above. Where tenant-specific variations exist, the system allows overriding the baseline curve.
