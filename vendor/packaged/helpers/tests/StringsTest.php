<?php
/**
 * @author  brooke.bryan
 */

class StringsTest extends PHPUnit_Framework_TestCase
{
  public function testSplitOnCamelCase()
  {
    $expectations = [
      ["camelWord", "camel Word"],
      ["camelWordX", "camel Word X"],
      ["userID", "user ID"],
      ["userID Second", "user ID Second"],
      ["ABCd", "AB Cd"],
    ];
    foreach($expectations as $expect)
    {
      $this->assertEquals(
        $expect[1],
        \Packaged\Helpers\Strings::splitOnCamelCase($expect[0])
      );
    }
  }

  public function testSplitOnUnderscores()
  {
    $expectations = [
      ["under_score", "under score"],
    ];
    foreach($expectations as $expect)
    {
      $this->assertEquals(
        $expect[1],
        \Packaged\Helpers\Strings::splitOnUnderscores($expect[0])
      );
    }
  }

  public function testStringToUnderScore()
  {
    $expectations = [
      ["firstName", "first_name"],
    ];
    foreach($expectations as $expect)
    {
      $this->assertEquals(
        $expect[1],
        \Packaged\Helpers\Strings::stringToUnderScore($expect[0])
      );
    }
  }

  public function testStringToCamelCase()
  {
    $expectations = [
      ["first name", "firstName"],
      ["first_name", "firstName"],
    ];
    foreach($expectations as $expect)
    {
      $this->assertEquals(
        $expect[1],
        \Packaged\Helpers\Strings::stringToCamelCase($expect[0])
      );
    }
  }

  public function testStringToPascalCase()
  {
    $expectations = [
      ["first name", "FirstName"],
      ["first_name", "FirstName"],
      ["firstName", "FirstName"],
    ];
    foreach($expectations as $expect)
    {
      $this->assertEquals(
        $expect[1],
        \Packaged\Helpers\Strings::stringToPascalCase($expect[0])
      );
    }
  }

  public function testTitleize()
  {
    $expectations = [
      ["first name", "First Name"],
      ["first_name", "First Name"],
      ["firstName", "FirstName"],
    ];
    foreach($expectations as $expect)
    {
      $this->assertEquals(
        $expect[1],
        \Packaged\Helpers\Strings::titleize($expect[0], false)
      );
    }
  }

  public function testTitleizeCamelSplit()
  {
    $expectations = [
      ["first name", "First Name"],
      ["first_name", "First Name"],
      ["firstName", "First Name"],
    ];
    foreach($expectations as $expect)
    {
      $this->assertEquals(
        $expect[1],
        \Packaged\Helpers\Strings::titleize($expect[0], true)
      );
    }
  }

  public function testHumanize()
  {
    $expectations = [
      ["first name", "First name"],
      ["first_name", "First name"],
      ["firstName", "FirstName"],
    ];
    foreach($expectations as $expect)
    {
      $this->assertEquals(
        $expect[1],
        \Packaged\Helpers\Strings::humanize($expect[0], false)
      );
    }
  }

  public function testHumanizeCamelSplit()
  {
    $expectations = [
      ["first name", "First name"],
      ["first_name", "First name"],
      ["firstName", "First name"],
    ];
    foreach($expectations as $expect)
    {
      $this->assertEquals(
        $expect[1],
        \Packaged\Helpers\Strings::humanize($expect[0], true)
      );
    }
  }

  public function testHyphenate()
  {
    $expectations = [
      ["first name", "first-name"],
      ["first_name", "first-name"],
      ["firstName", "firstName"],
    ];
    foreach($expectations as $expect)
    {
      $this->assertEquals(
        $expect[1],
        \Packaged\Helpers\Strings::hyphenate($expect[0])
      );
    }
  }

  public function testUrlize()
  {
    $expectations = [
      ["first name", "first-name"],
      ["first Name", "first-name"],
      ["first_name", "first-name"],
      ["first_namE", "first-name"],
      ["firstName", "firstname"],
    ];
    foreach($expectations as $expect)
    {
      $this->assertEquals(
        $expect[1],
        \Packaged\Helpers\Strings::urlize($expect[0])
      );
    }
  }

  public function testStringToRange()
  {
    $expectations = [
      ["one,two,three", ["one", "two", "three"]],
      ["one,two,3-7", ["one", "two", "3", "4", "5", "6", "7"]],
      ["one two,3-7", ["one", "two", "3", "4", "5", "6", "7"]],
      ["1-2,3-5,7", ["1", "2", "3", "4", "5", "7"]],
      ["1;2;3", ["1", "2", "3"]],
      ["1,2|3", ["1", "2", "3"]],
      ["server2-server4", ["server2", "server3", "server4"]],
      ["server2-xyz", ["server2-xyz"]],
    ];
    foreach($expectations as $expect)
    {
      $this->assertEquals(
        $expect[1],
        \Packaged\Helpers\Strings::stringToRange($expect[0])
      );
    }
  }

  public function testCommonPrefix()
  {
    $expectations = [
      ["abc1", "abc2", "abc"],
      ["abc1", "abd2", "ab"],
      ["serverName1", "serverName2", "serverName"],
    ];
    foreach($expectations as $expect)
    {
      $this->assertEquals(
        $expect[2],
        \Packaged\Helpers\Strings::commonPrefix($expect[0], $expect[1])
      );
    }
  }

  public function testCommonPrefixNotStoppingOnInts()
  {
    $expectations = [
      ["123abc", "123def", "123"],
      ["abc1", "abc2", "abc"],
      ["abc1", "abd2", "ab"],
      ["serverName1", "serverName2", "serverName"],
    ];
    foreach($expectations as $expect)
    {
      $this->assertEquals(
        $expect[2],
        \Packaged\Helpers\Strings::commonPrefix($expect[0], $expect[1], false)
      );
    }
  }

  public function testSplitAt()
  {
    $expectations = [
      ["abcdef", 3, ["abc", "def"]],
      ["ab", 3, ["ab", ""]],
    ];
    foreach($expectations as $expect)
    {
      $this->assertEquals(
        $expect[2],
        \Packaged\Helpers\Strings::splitAt($expect[0], $expect[1])
      );
    }
  }
}
