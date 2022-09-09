<?php
# INSTALLATION
#
# Add the docraptor package to your project:
# $ composer require docraptor/docraptor

$docraptor = new DocRaptor\DocApi();
# this key works in test mode!
$docraptor->getConfig()->setUsername("YOUR_API_KEY_HERE");

try {
    $doc = new DocRaptor\Doc();
    $doc->setTest(true); # test documents are free but watermarked
    $doc->setDocumentType("xls");
    # $doc->setDocumentContent("<h1>Hello, World!</h1>");
    $doc->setDocumentUrl("https://docraptor.com/examples/cohort_analysis.html");
    # $doc->setJavascript(false);
    # $prince_options = new DocRaptor\PrinceOptions();
    # $doc->setPrinceOptions($prince_options);
    # $prince_options->setMedia("print"); # @media 'screen' or 'print' CSS
    # $prince_options->setBaseurl("https://yoursite.com"); # the base URL for any relative URLs

    $response = $docraptor->createDoc($doc);

    # createDoc() returns a binary string
    file_put_contents("example-cohort-analysis.xls", $response);
    echo "Successfully created example-cohort-analysis.xls!";
} catch (DocRaptor\ApiException $error) {
    echo $error . "\n";
    echo $error->getMessage() . "\n";
    echo $error->getCode() . "\n";
    echo $error->getResponseBody() . "\n";
}
