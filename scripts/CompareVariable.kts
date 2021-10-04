fun main(args: Array<String>) {
  val word1 = "Bold"
  val word2 = "Bold"
  val word3 = "Not Bold"
  println("variable 1 = $word1")
  println("variable 2 = $word2")
  println("variable 3 = $word3\n")

  //style 1 to compare 2 variable
  if (word1 == word2)
    println("Equal, with content $word1\n") 
  else
    println("Not Equal, $word1 and $word2\n")

  //style 2 to compare 2 variable
  if (word1.equals(word3))
    println("Equal, with content $word1")
  else
    println("Not Equal, $word1 and $word3")
}
