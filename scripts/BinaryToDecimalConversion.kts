fun main(args: Array<String>) {
    val num: Long = 110110111
    val decimal = convertBinaryToDecimal(num)
    println("$num in binary = $decimal in decimal")
    println("")

    // converting decimal to binary from previous convert result
    val num2 = decimal
    val binary = Integer.toBinaryString(num2)
    println("$num2 in decimal = $binary in binary")
}

//extension to convert binary to decimal
fun convertBinaryToDecimal(num: Long): Int {
    var num = num
    var decimalNumber = 0
    var i = 0
    var remainder: Long

    while (num.toInt() != 0) {
        remainder = num % 10
        num /= 10
        decimalNumber += (remainder * Math.pow(2.0, i.toDouble())).toInt()
        ++i
    }
    return decimalNumber
}
