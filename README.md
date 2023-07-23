# MoodleFormPlugin
#### Form Plugin WideServices Qualification Requirement Test
## MoodleFormPlugin


### Επισκόπηση

Το MoodleFormPlugin είναι ένα plugin του Moodle που έχει σχεδιαστεί για να τη διαδικασία εγγραφής των χρηστών προσθέτοντας επαλήθευση μέσω email και παραγωγή προσωρινού κωδικού πρόσβασης.
### Υλοποίηση-Προσέγγιση

## `register_form.php`

Αυτό το αρχείο περιέχει τη φόρμα εγγραφής για το plugin. Στη φόρμα περιλαμβάνονται πεδία για email, όνομα, επίθετο, χώρα και κινητό τηλέφωνο. Η φόρμα υποβάλλεται στον εαυτό της για επεξεργασία και αποστολή δεδομένων.

## Xρησιμοποίησα:
Moodle API Documentation:Χρησιμοιποίησα τή Φόρμα απο το αρχείο `formslib.php`
με `settype()` και `addrule()` και `addelement()`

Τη συνάρτηση `setype()` τη χρησιμοποιησα για να ορίστει ο τύπος του στοιχείου που θα δημιουργηθεί. Ο τύπος μπορεί να είναι "form" ή "hidden", ανάλογα με το είδος του στοιχείου που θα δημιουργήσω. Η συνάρτηση `setype()` πρέπει να καλείται πριν τη δημιουργία του στοιχείου με την συνάρτηση `addelement()`.


### Βήματα

1. Εμφάνιση της φόρμας εγγραφής και των απαιτούμενων πεδίων.
2. Εκτέλεση ελέγχων στην πλευρά του πελάτη για την εγκυρότητα των δεδομένων.
3. Στην υποβολή της φόρμας, τα δεδομένα πρέπει να υποβληθούν στο αρχείο `register.php` για επεξεργασία και εγγραφή του χρήστη στη βάση δεδομένων.

## `register.php`

Αυτό το αρχείο αναλαμβάνει την επεξεργασία και εγγραφή των δεδομένων της φόρμας εγγραφής στη βάση δεδομένων. Συγκεκριμένα, εκτελεί τα παρακάτω βήματα:

### Βήματα

1. Λήψη των δεδομένων που υποβλήθηκαν από τη φόρμα εγγραφής.
2. Έλεγχος της βάσης δεδομένων για το αν η διεύθυνση email υπάρχει ήδη καταχωρημένη.
3. Αν η διεύθυνση email δεν είναι καταχωρημένη, τότε δημιουργία προσωρινού κωδικού πρόσβασης και αποθήκευση του νέου χρήστη στη βάση δεδομένων.
4. Αποστολή email επαλήθευσης με τον προσωρινό κωδικό πρόσβασης.
5. Ανακατεύθυνση του χρήστη στην σελίδα `registration_successful.php` για να ειδοποιηθεί ότι η εγγραφή ήταν επιτυχής.


## Χρησιμοίησα:
Moodle API Documentation: Χρησιμοποιώ το API του Moodle για την αποθήκευση των δεδομένων των χρηστών στη βάση δεδομένων. 

## `registration_successful.php`

Αυτό το αρχείο χρησιμοποιείται για να ενημερώσει το χρήστη ότι η εγγραφή του ήταν επιτυχής και να τον καλωσορίσει στην πλατφόρμα Moodle. Περιέχει το μήνυμα καλωσορίσματος και ζητά από τον χρήστη να ελέγξει το email του για τον προσωρινό κωδικό πρόσβασης.


### Βήματα

1. Εμφάνιση του μηνύματος καλωσορίσματος και ζήτηση από τον χρήστη να ελέγξει το email του για τον προσωρινό κωδικό πρόσβασης.
2. Ο χρήστης καλείται να πραγματοποιήσει την πρώτη του σύνδεση χρησιμοποιώντας τον προσωρινό κωδικό πρόσβασης που λάβει για να επισκεφθεί την πλατφόρμα Moodle.

## `version.php`

Αυτό το αρχείο περιλαμβάνει τις πληροφορίες έκδοσης του plugin. Χρησιμοποιείται για τον έλεγχο της συμβατότητας του plugin με τις διάφορες εκδόσεις του Moodle.


### Χαρακτηριστικά

- Φόρμα εγγραφής με πεδία για email, όνομα, επίθετο, χώρα και κινητό τηλέφωνο.
- Επαλήθευση των διευθύνσεων email, διασφαλίζοντας ότι είναι στη σωστή μορφή και δεν είναι ήδη καταχωρημένες.
- Παραγωγή προσωρινού κωδικού πρόσβασης για τους νέους χρήστες, ο οποίος αποστέλλεται μέσω email για την αρχική τους σύνδεση.
- Οι χρήστες πρέπει να επαληθεύσουν τη διεύθυνση email τους πριν από την πρόσβασή τους στην πλατφόρμα Moodle.

### Πώς Λειτουργεί?
2. **Φόρμα Εγγραφής**

   - Όταν οι χρήστες έχουν πρόσβαση στη φόρμα εγγραφής στην πλατφόρμα Moodle σας, θα βρεθούν με πεδία για email, όνομα, επίθετο, χώρα και κινητό τηλέφωνο.
   - Η φόρμα περιέχει Verification στην πλευρά του πελάτη για να διασφαλίσει ότι τα απαιτούμενα πεδία δεν παραμένουν κενά και ότι η διεύθυνση email είναι στη σωστή μορφή.

3. **Επαλήθευση Μέσω Email-Verification**

   - Verification Μετά την επιτυχή υποβολή της φόρμας, το plugin ελέγχει εάν η διεύθυνση email που δόθηκε είναι ήδη καταχωρημένη στην πλατφόρμα Moodle.
   - Verification Εάν η διεύθυνση email δεν είναι καταχωρημένη, το plugin παράγει έναν προσωρινό κωδικό πρόσβασης για το νέο χρήστη και αποθηκεύει τα δεδομένα του χρήστη    στη βάση δεδομένων, ρυθμίζοντας το πεδίο 'confirmed' σε 0 (μη επαληθευμένο).
   - Verification Το plugin αποστέλλει ένα email στον χρήστη με έναν σύνδεσμο επαλήθευσης και τον προσωρινό κωδικό πρόσβασης στην καταχωρημένη διεύθυνση email.
   - Οι χρήστες πρέπει να κάνουν κλικ στον σύνδεσμο επαλήθευσης για να επαληθεύσουν τη διεύθυνση email τους προτού αποκτήσουν πρόσβαση στην πλατφόρμα Moodle.
   

4. **Ασφάλεια Κωδικού Πρόσβασης**

   - Το plugin χρησιμοποιεί την ενσωματωμένη συνάρτηση `hash_internal_user_password()` του Moodle για να κρυπτογραφήσει με ασφάλεια τον προσωρινό κωδικό πρόσβασης πριν από την αποθήκευσή του στη βάση δεδομένων.
   - Αυτό διασφαλίζει ότι οι κωδικοί πρόσβασης των χρηστών δεν αποθηκεύονται σε μορφή κειμένου, βελτιώνοντας την ασφάλεια.
     
5. **DB record creation**
   - Καταχώρηση δεδομένων στη βάση

### Τεχνολογικό Περιβάλλον

- PHP
- Moodle (έκδοση 4.2.1)

### Δημιουργός

Αυτό το plugin δημιουργήθηκε από τον Νίκο Χαλέβα




