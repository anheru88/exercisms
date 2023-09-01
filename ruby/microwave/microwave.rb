=begin
Write your code for the 'Microwave' exercise in this file. Make the tests in
`microwave_test.rb` pass.

To get started with TDD, see the `README.md` file in your
`ruby/microwave` directory.
=end

class Microwave
  def initialize(time)
    @time = time
  end

  def timer
    @minutes = "00"
    @seconds = "00"
    if @time < 10
      @seconds = "0" + @time.to_s
    elsif @time < 60
      @seconds = @time.to_s
    elsif @time < 90
      @minutes = "01"
      @number = @time - 60
      if @number < 10
        @seconds = "0" + @number.to_s
      else
        @seconds = @number.to_s
      end
    elsif @time % 30 == 0 and @time < 100
      @number = @time / 30
      case @number
      when 1
        @seconds = "30"
      when 2
        @minutes = "01"
      else
        @minutes = "01"
        @seconds = "30"
      end
    elsif @time % 100 == 0
      @number = @time / 100
      if @number < 10
        @minutes = "0" + @number.to_s
      else
        @minutes = @number.to_s
      end
    else
      @number = @time / 100
      @module = @time % 100
      if @module < 60
        if @module < 10
          @seconds = "0" + @module.to_s
        else
          @seconds = @module.to_s
        end
      else
        @number = @number + 1
        @module = @module - 60
        if @module < 10
          @seconds = "0" + @module.to_s
        else
          @seconds = @module.to_s
        end

      end
      if @number < 10
        @minutes = "0" + @number.to_s
      else
        @minutes = @number.to_s
      end
    end

    "" + @minutes + ":" + @seconds
  end
end