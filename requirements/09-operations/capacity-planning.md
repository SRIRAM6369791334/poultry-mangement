# Capacity Planning Module

## Overview
Centralized capacity planning allows Sri Murugan Poultry & Agro Group to identify bottlenecks across farms, fleet, processing centers, and staff resources before they cause operational failures.

## Features

### FEAT-045: Farm Capacity Utilization
- **Purpose**: Track live bird capacity vs active placements.
- **Business Rule (TEMP-BR-050)**: `Max Capacity = Total Shed Area / Space Requirement per Bird (based on season)`.
- **Status**: [CLIENT-CONFIRMED]
- **Source**: CLIENT-CONV-L3102-L3105

### FEAT-046: Processing Plant Throughput
- **Purpose**: Prevent over-scheduling harvests beyond daily processing capability.
- **Business Rule (TEMP-BR-051)**: `Daily Harvest ≤ Plant Processing Capacity (Birds/Hour * Operating Hours)`.
- **Status**: [CLIENT-CONFIRMED]
- **Source**: CLIENT-CONV-L3140-L3145

### FEAT-047: Fleet Transport Capacity
- **Purpose**: Optimize bird transport scheduling.
- **Business Rule (TEMP-BR-052)**: Transport capacity must factor in mortality risk due to overloading, adjusted for temperature.
- **Status**: [INFERRED]
- **Source**: CLIENT-CONV-L3150-L3155

## User Stories
- **US-040**: As an Operations Manager, I want to view a 30-day capacity forecast for processing vs scheduled harvests, so I can arrange extra labor or adjust placement cycles.
- **US-041**: As a Transport Manager, I want an alert when scheduled dispatches exceed available fleet capacity.

## AI Opportunities (Future Scope)
- **Status**: [PROPOSED]
- **Idea**: AI-driven automatic balancing of harvest schedules to minimize transportation costs while ensuring the processing plant operates at 95% capacity.
