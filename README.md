## Databases

* table: customers
    * id: uuid primary
    * name: string
    * document_type: enum
    * document_number: string // unique
    * email: string // unique
    * Idx (document_type, document_number)
    * Idx
* table: retailers
    * id: uuid primary
    * name: string
    * document_number: string // unique
    * email: string
* table: wallets
    * id: uuid
    * user_id: uuid
    * user_type: String
    * balance: int
* table: transactions
    * id: uuid
    * payer_id: uuid references wallet
    * payee_id: uuid references wallet
    * status: string
    * amount: int

## External Services

* Payment Gateway
    * PicPay
    * ???
* Notification
    * Email
    * SMS

## Application Flow

    * João quer enviar um pagamento para maria
    * João tem 50 reais e quer enviar 40
    * João envia 40 reais para maria
        * Valida se tem saldo suficiente.
        * Debita valor da carteira de João.
        * Log dr valor removido.
        * Transfere valor para maria.
        * Garantir se o pagamento foi .enviado.
        * Maria recebe o pagamento.
        * Envia email para maria.