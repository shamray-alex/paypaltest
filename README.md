Yii 2 Advanced Project for Paypal Solution
===============================
For deploy use

    $ composer update 
    $ php init

Configure your DB connection in config file
	
    $ php yii migrate

In IPN folder is paypal listener that write all paypal response to DB. 
For most security put him to other domain example 

    ipn.example.com 

In **usage.php** configure your connection to database.

In view **products/buy.php** set *notify_url* where your listener is and *facilitator* email in **business** field

Go to **facilitator**account ***Profile -> My selling tools -> Website preferences*** and enable **Auto Return** and set **return Url**  to your Download page.