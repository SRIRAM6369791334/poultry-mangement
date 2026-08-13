# Mobile & Offline Requirements

[CONFIRMED] Based on CLIENT-034, CLIENT-035, CLIENT-038.

## 1. Mobile Application
- **Platform:** Android primary focus (covers field workers and drivers).
- **User Interface:** Simple, uncluttered UI designed for quick data entry by non-technical staff.
- **Languages:** Tamil (Primary) and English out-of-the-box [CLIENT-038].
- **Device Integration:** 
  - Camera (for uploading bills, documentation, or capturing proof of mortality).
  - Push Notifications.

## 2. Offline Architecture [CLIENT-035]
Because farms may have poor connectivity, the mobile app must support offline-first data entry.
- **Flow:** Offline Entry → Save to Local Device Storage → Detect Internet → Auto-Sync to Server.
- **Queuing:** Transactions are queued locally with timestamps.

## 3. Conflict Resolution
- **Rule:** DO NOT auto-overwrite server data if a conflict is detected (e.g., if another user modified the same batch record while this device was offline).
- **Resolution:** If a conflict occurs, the sync engine must flag the record and prompt an authorized user/manager to manually resolve the conflict.

## 4. Local Data Security [PROPOSED]
- Offline data stored on the device must be encrypted or cleared upon user logout.
- Strict limit on the amount of historical data synced to the device to prevent data leakage if a device is lost.
