import java.time.LocalDateTime
import kotlinx.coroutines.*

fun main() = runBlocking {
  doWorld()
  println("Done")
}

// Concurrently executes both sections
suspend fun doWorld() = coroutineScope { // this: CoroutineScope
  launch(Dispatchers.Unconfined) {
    delay(2000L)
    val current2 = LocalDateTime.now()
    println("Current Date and Time is: $current2")
	println("World 2\n")
  }
  launch(Dispatchers.Unconfined) {
    delay(1000L)
    val current1 = LocalDateTime.now()
    println("Current Date and Time is: $current1")
	println("World 1\n")
  }
  
  val current3 = LocalDateTime.now()
  println("Current Date and Time is: $current3")
  println("Hello\n")
}
