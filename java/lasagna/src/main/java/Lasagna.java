public class Lasagna {

    public int expectedMinutesInOven() {
        return 40;
    }

    public int remainingMinutesInOven(int Minutes) {
        return this.expectedMinutesInOven() - Minutes;
    }

    public int preparationTimeInMinutes(int Layer) {
        return 2 * Layer;
    }

    public int totalTimeInMinutes(int Layer, int MinutsInOven) {
        return this.preparationTimeInMinutes(Layer) + MinutsInOven;
    }
}
