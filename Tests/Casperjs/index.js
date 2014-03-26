
casper.test.begin('Check we get a derp', 1, function suite(test) {
    casper.start("http://"+casper.cli.options.url+"/", function() {
        test.assertTextExists('derpderp', 'The text exists');
    });
//derpderpedperperperperperp
    casper.run(function() {
        test.done();
    });
});
