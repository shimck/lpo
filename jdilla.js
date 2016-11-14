function dm(amount)
{
    string ="" + amount;
    dec = string.length - string.indexOf('.');
    if(string.indexOf('.') == -1)
	return string + '.00';
    if(dec == 1)
	return string + '00';
    if(dec == 2)
	return string + '0';
    if(dec > 3)
	return string.substring(0,string.length-dec+3);
    return string;

}


function calculate()
{
    QtyA = 0; QtyB = 0; QtyC = 0; QtyD = 0;
    TotA = 0; TotB = 0; TotC = 0; TotD = 0;
    TaxValue = 0;
    DiscountValue = 0;
    TaxTotal = 0; DiscountTotal = 0;
    
    
    PrcA = 0;
    PrcB = 0;
    PrcC = 0;
    PrcD = 0;

    if(document.ofrm.uct1.value > "")
    {
	PrcA = document.ofrm.uct1.value 
    };
    document.ofrm.uct1.value = eval(PrcA);

    if(document.ofrm.uct2.value > "")
    {
	PrcB = document.ofrm.uct2.value 
    };
    document.ofrm.uct2.value = eval(PrcB);

    if(document.ofrm.uct3.value > "")
    {
	PrcC = document.ofrm.uct3.value 
    };
    document.ofrm.uct3.value = eval(PrcC);

    if(document.ofrm.uct4.value > "")
    {
	PrcD = document.ofrm.uct4.value 
    };
    document.ofrm.uct4.value = eval(PrcD);

    
    if(document.ofrm.qty1.value > "")
    {
	QtyA = document.ofrm.qty1.value 
    };
    document.ofrm.qty1.value = eval(QtyA);

    if(document.ofrm.qty2.value > "")
    {
	QtyB = document.ofrm.qty2.value 
    };
    document.ofrm.qty2.value = eval(QtyB);

    if(document.ofrm.qty3.value > "")
    {
	QtyC = document.ofrm.qty3.value
    };
    document.ofrm.qty3.value = eval(QtyC);

    if(document.ofrm.qty4.value > "")
    {
	QtyD = document.ofrm.qty4.value
    };
    document.ofrm.qty4.value = eval(QtyD);
   
    if(document.ofrm.tax.value > "")
    {
	TaxValue = document.ofrm.tax.value
    };
    document.ofrm.tax.value = eval(TaxValue);

    if(document.ofrm.discount.value > "")
    {
	DiscountValue = document.ofrm.discount.value
    };
    document.ofrm.discount.value = eval(DiscountValue);
   
    
    TotA = QtyA * PrcA;

    TotB = QtyB * PrcB;

    TotC = QtyC * PrcC;

    TotD = QtyD * PrcD;

    document.ofrm.tot1.value = dm(eval(TotA));
    document.ofrm.tot2.value = dm(eval(TotB));
    document.ofrm.tot3.value = dm(eval(TotC));
    document.ofrm.tot4.value = dm(eval(TotD));

    TaxTotal = TaxValue / 100;
    DiscountTotal = DiscountValue / 100;

    SubTotal = (eval(TotA) + eval(TotB) + eval(TotC) + eval(TotD)); 
    SubTotal -= (SubTotal * eval(DiscountTotal));
    document.ofrm.SubTot.value = dm(eval(SubTotal));
    
    Totamt = SubTotal + (SubTotal * eval(TaxTotal));      

    

    document.ofrm.GrandTotal.value = dm(eval(Totamt));

}
