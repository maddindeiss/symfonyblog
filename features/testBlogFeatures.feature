# language: de
@javascript
Funktionalität: Klicke Link

    Szenario: Klicke auf einen Blog Eintrag
        Angenommen  ich bin auf "/"
        Dann        klicke den "Link" "About"
        Dann        klicke den "Link" "Home"
        Dann        klicke den "Link" "Continue reading..."

    Szenario: Fülle Kommentar Form aus
        Angenommen  ich bin auf "/"
        Dann        klicke den "Link" "Continue reading..."
        Dann        fülle das Formular mit:
                    | app_comment_user      | Maddin            |
                    | app_comment_comment   | Toller Kommentar  |
        Und         klicke den "Button" "Submit"
        Dann        lade die Seite neu
        Dann        finde letzten erstellten Kommentar mit Username "Maddin"


    Szenario: Sende Email über Kontakt Formular
        Angenommen  ich bin auf "/contact"
        Dann        fülle das Formular mit:
                    | contact_name      | Maddin                      |
                    | contact_email     | deiss@gardenofconcepts.com  |
                    | contact_subject   | Test Subject                |
                    | contact_body      | Test Body                   |
        Und         klicke den "Button" "Submit"
        Dann        siehst du "Your contact enquiry was successfully sent. Thank you!" als Bestätigung
        Dann        lade die Seite neu