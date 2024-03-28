package demo;

class App {
  public static void main(String[] args) {
    for (int i = 1; i <= 100; i++) {
      boolean div3 = i % 3 == 0;
      boolean div5 = i % 5 == 0;

      if (div3 && div5) {
        System.out.println("TigaLima");
      } else if (div3) {
        System.out.println("Tiga");
      } else if (div5) {
        System.out.println("Lima");
      } else {
        System.out.printf("%d\n", i);
      }
    }
  }
}