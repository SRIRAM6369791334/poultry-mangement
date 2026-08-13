# 9.1 Employee & Payroll Management

## 9.1.1 Overview
This module handles the management of the 85+ employees across farms, warehouses, and the office, managing attendance, and payroll processing for Sri Murugan Poultry & Agro Group.

## 9.1.2 Employee Management (CLIENT-022)
| Req ID | Feature | Description | Source |
|---|---|---|---|
| EMP-01 | Employee Profile | System must store employee details: Name, Contact, Address, Government ID, Emergency Contact. | [CONFIRMED] |
| EMP-02 | Employee Types/Designations | Must support categories: Office, Farm, Warehouse, Driver, Sales, Accounts, Management. | [CONFIRMED] |
| EMP-03 | Farm/Location Assignment | Ability to assign employees to specific farms (out of the 8), warehouses, or the central office. | [CONFIRMED] |
| EMP-04 | Employment Details | Track joining date, base salary, department, and current status (active/inactive). | [CONFIRMED] |

## 9.1.3 Attendance Management (CLIENT-023)
| Req ID | Feature | Description | Source |
|---|---|---|---|
| ATT-01 | Manual Attendance Entry | Supervisors/managers must be able to manually record attendance for farm workers who do not currently have biometric access. | [CONFIRMED] |
| ATT-02 | Leave Management | Track different types of leaves and their impact on payroll. | [CONFIRMED] |
| ATT-03 | Overtime Tracking | Record extra hours worked for overtime calculation. | [CONFIRMED] |
| ATT-04 | Modern Attendance Integration | Support for mobile attendance, GPS tracking for field staff, QR code scanning, and Biometric device integration. | [FUTURE] |

## 9.1.4 Payroll Processing (CLIENT-024)
| Req ID | Feature | Description | Source |
|---|---|---|---|
| PAY-01 | Payroll Calculation Formula | System must calculate Net Salary = Basic Salary + Overtime + Allowance - Advance - Deduction. (Based on Attendance). | [CONFIRMED] |
| PAY-02 | Salary Components | Define and manage flexible salary components (Basic, Allowances, specific deductions, PF/ESI). | [TO BE CONFIRMED] |
| PAY-03 | Advance Management | Track employee salary advances and automatically deduct agreed installment amounts during payroll processing. | [CONFIRMED] |
| PAY-04 | Salary History | System must preserve historical salary records and changes to employee compensation. | [CONFIRMED] |
| PAY-05 | Payslip Generation | Ability to generate and distribute payslips to employees. | [PROPOSED] |
