<?php

function customerTable($customerArray)
{
    $customerEmail = array_keys($customerArray);
    global $formTitles,$formIds, $forms, $products, $productNum, $totalProductNum, $paymentMethodArray, $formArray;
        
    echo "<table class='customerTable' id='customerTable' align='center'>";

        echo "<thead>";
            echo "<tr>";
            $countCols = 0;
                echo "<th>Customer Email</th>";
                $countCols++;
                echo "<th class='productNumber' id='productNumber'># of Products *</th>";
                $countCols++;
                echo "<th class='totalAmount' id='totalAmount'>Total Amount **</th>";
                $countCols++;

    for ($i = 0; $i < count($formTitles); $i++) {
        echo "<th class='formName'>";
        echo "<a target='_blank' href='https://www.jotform.com/sheets/".$formIds[$i]."'>".$formTitles[$i]."</a>";
        echo "<a target='_blank'".logo($paymentMethodArray[$formTitles[$i]])."'>";
        echo "<img src='/customer-management/img/logos/".$paymentMethodArray[$formTitles[$i]].".png' alt='".$paymentMethodArray[$formTitles[$i]]."' class='paymentMethodLogo'>";
        echo "</a><span class='badge'>";
            echo "<span id='popoverData' class='popover' href='#' rel='popover' data-placement='left' data-trigger='hover'>".$totalProductNum[$i]."</span>";
            echo "<span id='productdetail' class='hovertext'># of products sold with this form</span></th>";
            $countCols++;
    }
                echo "<th> </th>";
                $countCols++;
                echo "</tr>";
                echo "</thead>";

                echo "<tbody>";
                
    for ($j = 0; $j < count($customerArray); $j++) {
        echo "<tbody class='show'>";
            echo "<tr>";
        if (!(array_key_exists("ip", $customerArray[$customerEmail[$j]]))) {
            echo "<td class='email'>".$customerEmail[$j]."</td>";
            echo "<td>";
            $productNum = 0;
            foreach ($customerArray[$customerEmail[$j]] as $key => $value) {
                $productNum = $productNum + count($value["products"]);
            }
            echo $productNum;
            echo "</td>";
            echo "<td>";
            $totalPaymentAmount = 0;
            foreach ($customerArray[$customerEmail[$j]] as $key => $value) {
                $totalPaymentAmount = $totalPaymentAmount + $value["total"];
            }
            echo $value["currency"].$totalPaymentAmount;
            echo "</td>";
                            
            echo "<pre>";

            for ($n = 0; $n < count($formTitles); $n++) {
                echo "<td class='saledProducts' style='text-align: center;'>";
                for ($m = 0; $m < count(($customerArray[$customerEmail[$j]])); $m++) {
                    if ($customerArray[$customerEmail[$j]][$m]["formTitle"] == $formTitles[$n]) {
                        echo "saled ".count($customerArray[$customerEmail[$j]][$m]["products"])." products";
                    }
                }
                echo "</td>";
            }
            echo "<td>";
            echo "<button class='collapsible'>Product Details</button>";
            echo "</td>";
        }

            echo "</tr>";
        echo "</tbody>";
        echo "<tbody class='hide' style='display:none;'>";
            echo "<tr>";
                echo "<td> </td>";
                echo "<td> </td>";
                echo "<td> </td>";
                            
        for ($n = 0; $n < count($formTitles); $n++) {
            echo "<td>";
            $newValue2 = null;
            for ($m = 0; $m < count(($customerArray[$customerEmail[$j]])); $m++) {
                if ($customerArray[$customerEmail[$j]][$m]["formTitle"] == $formTitles[$n]) {
                    foreach ($customerArray[$customerEmail[$j]][$m]["products"] as $key => $newValue) {
                        $newValue1 = substr($newValue, 0, strpos($newValue, '('));
                        $newValue2 = substr($newValue, strpos($newValue, '(') + 9);
                        $newValue = $newValue1."(".$newValue2;
                        echo "<ul><li><em>".$newValue."</em></li></ul>";
                        //echo "</br>";
                    }
                }
            }
            echo "</td>";
        }
                echo "<td> </td>";
            echo "</tr>";
        echo "</tbody>";
    }

                echo "</tbody>";
    
                echo "<tfoot class='remarks'>";
                echo "<tr>";
                echo "<td class='footproductNumber' colspan='".$countCols."'>";
                    echo "<em>* '# of Products'</em> is the total number of products that the customer paid for the selected forms.";
                echo "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td class='foottotalAmount' colspan='".$countCols."'>";
                    echo "<em>** 'Total Amount'</em> is the total payment amount that the customer paid for the selected forms.";
                echo "</td>";
                echo "</tr>";
                echo "</tfoot>";
    
                echo "</table>";
}
