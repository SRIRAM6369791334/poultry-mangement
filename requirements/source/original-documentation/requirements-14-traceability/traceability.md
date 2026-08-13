# Traceability Matrix

This document ensures that every major confirmed client requirement traces from the original client answer down to the technical QA requirement.

## Core Traceability Chain

| Client Source | Business Fact | Module | Feature | Business Rule | User Story | QA Requirement |
|---------------|---------------|--------|---------|---------------|------------|----------------|
| CLIENT-127 | Live vs Processed Sales Pricing | MOD-003 (Processing) | FEAT-021 (Processing Form Selection) | BR-002 (Live = Customer Loss, Processed = Company Loss) | US-004 (Sales Mode Pricing) | QA-012 (Verify billing formula based on sales mode) |
| CLIENT-097 | Weight Reconciliation | MOD-003 (Processing) | FEAT-023 (Yield Tracking) | BR-001 (Input = Saleable + By-Product + Waste + Loss) | US-008 (Weight Reconciliation Alert) | QA-015 (Simulate weight mismatch to trigger alerts) |
| CLIENT-170 | AI Demand Forecasting | MOD-011 (Intelligence) | FEAT-038 (Seasonal Predictor) | BR-015 (Forecast = History + Seasonality) | US-011 (View 3-Month Forecast) | QA-022 (Verify historical data processing accuracy) |
| CLIENT-027 | Batch Profitability | MOD-009 (Finance) | FEAT-028 (Batch Costing) | BR-008 (Revenue - All Direct/Indirect Costs = Profit) | US-012 (View Batch P&L) | QA-025 (Verify batch cost aggregation across modules) |
| CLIENT-035 | Offline Mobile App | MOD-012 (System) | FEAT-041 (Offline Sync) | BR-021 (Conflict Resolution: Manual Review on Overwrite) | US-014 (Offline Data Entry) | QA-030 (Network toggle testing for sync conflicts) |

*Note: This is a representative matrix of the highest priority features. Full traceability will be automatically tracked in the Jira/Requirements Management tool during Sprint implementation.*
